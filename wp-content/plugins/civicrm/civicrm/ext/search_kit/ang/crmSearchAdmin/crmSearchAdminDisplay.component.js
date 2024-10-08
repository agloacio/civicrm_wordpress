(function(angular, $, _) {
  "use strict";

  angular.module('crmSearchAdmin').component('crmSearchAdminDisplay', {
    bindings: {
      savedSearch: '<',
      display: '<'
    },
    require: {
      crmSearchAdmin: '^crmSearchAdmin'
    },
    template: function() {
      // Dynamic template generates switch condition for each display type
      var html =
        '<div ng-switch="$ctrl.display.type">\n';
      _.each(CRM.crmSearchAdmin.displayTypes, function(type) {
        html +=
          '<div ng-switch-when="' + type.id + '">\n' +
          '  <div class="help-block"><i class="crm-i ' + type.icon + '"></i> ' + _.escape(type.description) + '</div>' +
          '  <search-admin-display-' + type.id + ' api-entity="$ctrl.savedSearch.api_entity" api-params="$ctrl.savedSearch.api_params" display="$ctrl.display"></search-admin-display-' + type.id + '>\n' +
          '  <hr>\n' +
          '  <button type="button" class="btn btn-{{ !$ctrl.stale ? \'success\' : $ctrl.preview ? \'warning\' : \'primary\' }}" ng-click="$ctrl.previewDisplay()" ng-disabled="!$ctrl.stale">\n' +
          '  <i class="crm-i ' + type.icon + '"></i>' +
          '  {{ $ctrl.preview && $ctrl.stale ? ts("Refresh") : ts("Preview") }}\n' +
          '  </button>\n' +
          '  <hr>\n' +
          '  <div ng-if="$ctrl.preview">\n' +
          '    <' + type.name + ' api-entity="{{:: $ctrl.savedSearch.api_entity }}" search="$ctrl.savedSearch" display="$ctrl.display" settings="$ctrl.display.settings"></' + type.name + '>\n' +
          '  </div>\n' +
          '</div>\n';
      });
      html += '</div>';
      return html;
    },
    controller: function($scope, $timeout, searchMeta) {
      var ts = $scope.ts = CRM.ts('org.civicrm.search_kit'),
        ctrl = this;
      let initDefaults;

      this.isSuperAdmin = CRM.checkPerm('all CiviCRM permissions and ACLs');
      this.aclBypassHelp = ts('Only users with "all CiviCRM permissions and ACLs" can disable permission checks.');

      this.preview = this.stale = false;

      // Extra (non-field) colum types
      this.colTypes = {
        links: {
          label: ts('Links'),
          icon: 'fa-link',
          defaults: {
            links: []
          }
        },
        buttons: {
          label: ts('Buttons'),
          icon: 'fa-square-o',
          defaults: {
            size: 'btn-xs',
            links: []
          }
        },
        menu: {
          label: ts('Menu'),
          icon: 'fa-bars',
          defaults: {
            text: '',
            style: 'default',
            size: 'btn-xs',
            icon: 'fa-bars',
            links: []
          }
        },
        include: {
          label: ts('Custom Code'),
          icon: 'fa-code',
          defaults: {
            path: ''
          }
        }
      };

      this.dateFormats = CRM.crmSearchAdmin.dateFormats;

      // Drag-n-drop settings for reordering columns
      this.sortableOptions = {
        connectWith: '.crm-search-admin-edit-columns',
        containment: '.crm-search-admin-edit-columns-wrapper',
        cancel: 'input,textarea,button,select,option,a,label'
      };

      this.styles = CRM.crmSearchAdmin.styles;

      function selectToKey(selectExpr) {
        return selectExpr.split(' AS ').slice(-1)[0];
      }

      this.addCol = function(type) {
        var col = _.cloneDeep(this.colTypes[type].defaults);
        col.type = type;
        if (this.display.type === 'table') {
          col.alignment = 'text-right';
        }
        ctrl.display.settings.columns.push(col);
      };

      this.removeCol = function(index) {
        ctrl.display.settings.columns.splice(index, 1);
      };

      this.getColumnIndex = function(key) {
        key = selectToKey(key);
        return ctrl.display.settings.columns.findIndex(col => key === col.key);
      };

      this.columnExists = function(key) {
        return ctrl.getColumnIndex(key) > -1;
      };

      this.toggleColumn = function(key) {
        let index = ctrl.getColumnIndex(key);
        if (index > -1) {
          ctrl.removeCol(index);
        } else {
          ctrl.display.settings.columns.push(searchMeta.fieldToColumn(key, initDefaults));
        }
      };

      this.getDataType = function(key) {
        const expr = ctrl.getExprFromSelect(key);
        const info = searchMeta.parseExpr(expr);
        const field = (_.findWhere(info.args, {type: 'field'}) || {}).field || {};
        return (info.fn && info.fn.data_type) || field.data_type;
      };

      this.isDate = function(key) {
        return ['Date', 'Timestamp'].includes(this.getDataType(key));
      };

      this.getExprFromSelect = function(key) {
        var match;
        _.each(ctrl.savedSearch.api_params.select, function(expr) {
          var parts = expr.split(' AS ');
          if (_.includes(parts, key)) {
            match = parts[0];
            return false;
          }
        });
        return match;
      };

      this.getFieldLabel = function(key) {
        var expr = ctrl.getExprFromSelect(selectToKey(key));
        return searchMeta.getDefaultLabel(expr);
      };

      this.getColLabel = function(col) {
        if (col.type === 'field' || col.type === 'image' || col.type === 'html') {
          return ctrl.getFieldLabel(col.key);
        }
        return ctrl.colTypes[col.type].label;
      };

      this.toggleEmptyVal = function(col) {
        if (col.empty_value) {
          delete col.empty_value;
        } else {
          col.empty_value = ts('None');
        }
      };

      this.toggleRewrite = function(col) {
        if (col.rewrite) {
          col.rewrite = '';
        } else {
          col.rewrite = '[' + col.key + ']';
          delete col.editable;
        }
      };

      this.toggleImage = function(col) {
        if (col.type === 'image') {
          delete col.image;
          col.type = 'field';
        } else {
          col.image = {
            alt: this.getColLabel(col)
          };
          delete col.editable;
          col.type = 'image';
        }
      };

      this.toggleHtml = function(col) {
        if (col.type === 'html') {
          col.type = 'field';
        } else {
          delete col.editable;
          delete col.link;
          delete col.icons;
          col.type = 'html';
        }
      };

      this.canBeImage = function(col) {
        var expr = ctrl.getExprFromSelect(col.key),
          info = searchMeta.parseExpr(expr);
        return info.args[0] && info.args[0].field && info.args[0].field.input_type === 'File';
      };

      this.toggleEditable = function(col) {
        if (col.editable) {
          delete col.editable;
        } else {
          col.editable = true;
        }
      };

      this.canBeEditable = function(col) {
        var expr = ctrl.getExprFromSelect(col.key),
          info = searchMeta.parseExpr(expr);
        return !col.rewrite && !col.link && !info.fn && info.args[0] && info.args[0].field && !info.args[0].field.readonly;
      };

      // Checks if a column contains a sortable value
      // Must be a real sql expression (not a pseudo-field like `result_row_num`)
      this.canBeSortable = function(col) {
        // Column-header sorting is incompatible with draggable sorting
        if (ctrl.display.settings.draggable) {
          return false;
        }
        var expr = ctrl.getExprFromSelect(col.key),
          info = searchMeta.parseExpr(expr),
          arg = (info && info.args && _.findWhere(info.args, {type: 'field'})) || {};
        return arg.field && arg.field.type !== 'Pseudo';
      };

      // Aggregate functions (COUNT, AVG, MAX) cannot autogenerate links, except for GROUP_CONCAT
      // which gets special treatment in APIv4 to convert it to an array.
      function canUseLinks(colKey) {
        var expr = ctrl.getExprFromSelect(colKey),
          info = searchMeta.parseExpr(expr);
        return !info.fn || info.fn.category !== 'aggregate' || info.fn.name === 'GROUP_CONCAT';
      }

      var linkProps = ['path', 'entity', 'action', 'join', 'target'];

      this.toggleLink = function(column) {
        if (column.link) {
          ctrl.onChangeLink(column, {});
        } else {
          delete column.editable;
          var defaultLink = ctrl.getLinks(column.key)[0];
          ctrl.onChangeLink(column, defaultLink || {path: 'civicrm/'});
        }
      };

      this.onChangeLink = function(column, afterLink) {
        column.link = column.link || {};
        var beforeLink = column.link.action && _.findWhere(ctrl.getLinks(column.key), {action: column.link.action});
        if (!afterLink.action && !afterLink.path) {
          if (beforeLink && beforeLink.text === column.title) {
            delete column.title;
          }
          delete column.link;
          return;
        }
        if (afterLink.text && ((!column.title && !beforeLink) || (beforeLink && beforeLink.text === column.title))) {
          column.title = afterLink.text;
        } else if (!afterLink.text && (beforeLink && beforeLink.text === column.title)) {
          delete column.title;
        }
        _.each(linkProps, function(prop) {
          column.link[prop] = afterLink[prop] || '';
        });
      };

      this.getLinks = function(columnKey) {
        if (!ctrl.links) {
          ctrl.links = {
            '*': ctrl.crmSearchAdmin.buildLinks(true),
            '0': []
          };
          ctrl.links[''] = _.filter(ctrl.links['*'], {join: ''});
          searchMeta.getSearchTasks(ctrl.savedSearch.api_entity).then(function(tasks) {
            _.each(tasks, function (task) {
              if (task.number === '> 0' || task.number === '=== 1') {
                var link = {
                  text: task.title,
                  icon: task.icon,
                  task: task.name,
                  entity: task.entity,
                  target: 'crm-popup',
                  join: '',
                  style: task.name === 'delete' ? 'danger' : 'default'
                };
                ctrl.links['*'].push(link);
                ctrl.links[''].push(link);
              }
            });
          });
        }
        if (!columnKey) {
          return ctrl.links['*'];
        }
        if (!canUseLinks(columnKey)) {
          return ctrl.links['0'];
        }
        var expr = ctrl.getExprFromSelect(columnKey),
          info = searchMeta.parseExpr(expr),
          joinEntity = searchMeta.getJoinEntity(info);
        if (!ctrl.links[joinEntity]) {
          ctrl.links[joinEntity] = _.filter(ctrl.links['*'], {join: joinEntity});
        }
        return ctrl.links[joinEntity];
      };

      this.pickIcon = function(model, key) {
        searchMeta.pickIcon().then(function(icon) {
          model[key] = icon;
        });
      };

      // Helper function to sort active from hidden columns and initialize each column with defaults
      this.initColumns = function(defaults) {
        initDefaults = defaults;
        if (!ctrl.display.settings.columns) {
          ctrl.display.settings.columns = _.transform(ctrl.savedSearch.api_params.select, function(columns, fieldExpr) {
            columns.push(searchMeta.fieldToColumn(fieldExpr, defaults));
          });
        } else {
          let activeColumns = ctrl.display.settings.columns.map(col => col.key);
          let selectAliases = ctrl.savedSearch.api_params.select.map(selectExpr => selectToKey(selectExpr));
          // Delete any column that is no longer in the
          activeColumns.reverse().forEach((key, index) => {
            if (key && !selectAliases.includes(key)) {
              ctrl.removeCol(activeColumns.length - 1 - index);
            }
          });
        }
      };

      this.previewDisplay = function() {
        ctrl.preview = !ctrl.preview;
        ctrl.stale = false;
        if (!ctrl.preview) {
          $timeout(function() {
            ctrl.preview = true;
          }, 100);
        }
      };

      this.getDefaultLimit = function() {
        return CRM.crmSearchAdmin.defaultPagerSize;
      };

      this.getDefaultSort = function() {
        var apiEntity = ctrl.savedSearch.api_entity,
          sort = [];
        if (searchMeta.getEntity(apiEntity).order_by) {
          sort.push([searchMeta.getEntity(apiEntity).order_by, 'ASC']);
        }
        return sort;
      };

      this.fieldsForSort = function() {
        function disabledIf(key) {
          return _.findIndex(ctrl.display.settings.sort, [key]) >= 0;
        }
        return {
          results: [
            {
              text: ts('Random'),
              icon: 'crm-i fa-random',
              id: 'RAND()',
              disabled: disabledIf('RAND()')
            },
            {
              text: ts('Columns'),
              children: ctrl.crmSearchAdmin.getSelectFields(disabledIf)
            }
          ].concat(ctrl.crmSearchAdmin.getAllFields('', ['Field', 'Custom', 'Extra'], disabledIf))
        };
      };

      // Generic function to add to a setting array if the item is not already there
      this.pushSetting = function(name, value) {
        ctrl.display.settings[name] = ctrl.display.settings[name] || [];
        if (_.findIndex(ctrl.display.settings[name], value) < 0) {
          ctrl.display.settings[name].push(value);
        }
      };

      $scope.$watch('$ctrl.display.settings', function() {
        ctrl.stale = true;
      }, true);
    }
  });

})(angular, CRM.$, CRM._);
