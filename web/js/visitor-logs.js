//== Class definition

var remoteData = function() {
  //== Private functions

  // basic demo
  var fetchData = function() {

    var datatable = $('.m_datatable').mDatatable({
      // datasource definition
     /* data: {
        type: 'remote',
        source: {
          read: {
            // sample GET method
            method: 'GET',
            url: 'visitor-logs/data',
            map: function(raw) {
              // sample data mapping
              var dataSet = raw;
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }
              return dataSet;
            },
          },
        },
        pageSize: 10,
        saveState: {
          cookie: true,
          webstorage: true,
        },
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true,
      },
	  */
	  
	  			data: {
				type: 'remote',
				source: 'visitor-logs/data',
				pageSize: 10,
        serverPaging: false,
        serverFiltering: false,
        serverSorting: false
			},


      // layout definition
      layout: {
        theme: 'default', // datatable theme
        class: 'm-datatable--brand', // custom wrapper class
        scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
        footer: false, // display/hide footer

	 },

      // column sorting
      sortable: true,

      pagination: true,

    toolbar: {
        layout: ['pagination', 'info'],

        placement: ['bottom'],  //'top', 'bottom'

        items: {
            pagination: {
                type: 'default',

                pages: {
                    desktop: {
                        layout: 'default',
                        pagesNumber: 6
                    },
                    tablet: {
                        layout: 'default',
                        pagesNumber: 3
                    },
                    mobile: {
                        layout: 'compact'
                    }
                },

                navigation: {
                    prev: true,
                    next: true,
                    first: true,
                    last: true
                },

                pageSizeSelect: [10, 20, 30, 50, 100]
            },

            info: true
        }
    },
    translate: {
        records: {
            processing: 'Please wait...',
            noRecords: 'No records found'
        },
        toolbar: {
            pagination: {
                items: {
                    default: {
                        first: 'First',
                        prev: 'Previous',
                        next: 'Next',
                        last: 'Last',
                        more: 'More pages',
                        input: 'Page number',
                        select: 'Select page size'
                    },
                    info: 'Displaying {{start}} - {{end}} of {{total}} records'
                }
            }
        }
    },
      search: {
        input: $('#search'),
      },

      // columns definition
      columns: [
        {
          field: 'visitorLogID',
          title: '#',
          sortable: false, // disable sort for this column
          width: 40,
          selector: false,
          textAlign: 'center',
        },{
          field: 'visitorName',
          title: 'Full Names',
          // sortable: 'asc', // default sort
          filterable: false, // disable or enable filtering
          width: 150,
        },{
          field: 'hostName',
          title: 'Visiting',
          // sortable: 'asc', // default sort
          filterable: false, // disable or enable filtering
          width: 150,
        }, {
          field: 'telephoneNo',
          title: 'telephone No',
          width: 100,
        }, {
          field: 'identificationNo',
          title: 'identification No',
		   width: 100,
        }, {
          field: 'timeIN',
          title: 'time IN',
          type: 'date',
        }, {
          field: 'Status',
          title: 'Status',
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {'title': 'Signed IN ', 'class': 'm-badge--brand'},
              2: {'title': 'Signed OUT', 'class': ' m-badge--metal'},
              3: {'title': 'Canceled', 'class': ' m-badge--primary'},
              4: {'title': 'Success', 'class': ' m-badge--success'},
              5: {'title': 'Info', 'class': ' m-badge--info'},
              6: {'title': 'Danger', 'class': ' m-badge--danger'},
              7: {'title': 'Warning', 'class': ' m-badge--warning'},
            };
            return '<span class="m-badge ' + status[row.flag].class + ' m-badge--wide">' + status[row.flag].title + '</span>';
          },
        },  {
          field: 'time OUT',
          title: 'time OUT',
          type: 'date',
        }, {
          field: 'Actions',
          width: 110,
          title: 'Actions',
          sortable: false,
          overflow: 'visible',
          template: function(row) {

            return '\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Sign OUT">\
							<i class="la-sign-out"></i>\
						</a>\
					';
          },
        }],
    });

    var query = datatable.getDataSourceQuery();
/*
    $('#m_form_status').on('change', function() {
      // shortcode to datatable.getDataSourceParam('query');
      var query = datatable.getDataSourceQuery();
      query.Status = $(this).val().toLowerCase();
      // shortcode to datatable.setDataSourceParam('query', query);
      datatable.setDataSourceQuery(query);
      datatable.load();
    }).val(typeof query.Status !== 'undefined' ? query.Status : '');

    $('#m_form_type').on('change', function() {
      // shortcode to datatable.getDataSourceParam('query');
      var query = datatable.getDataSourceQuery();
      query.Type = $(this).val().toLowerCase();
      // shortcode to datatable.setDataSourceParam('query', query);
      datatable.setDataSourceQuery(query);
      datatable.load();
    }).val(typeof query.Type !== 'undefined' ? query.Type : '');

    $('#m_form_status, #m_form_type').selectpicker();
*/
  };

  return {
    // public functions
    init: function() {
      fetchData();
    },
  };
}();

jQuery(document).ready(function() {
  remoteData.init();
});