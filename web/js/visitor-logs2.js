//== Class definition

var DatatableRecordSelectionDemo = function () {
        //== Private functions

        // basic demo
        var demo = function () {

                var datatable = $('.m_datatable').mDatatable({
                        // datasource definition
                        data: {
                                type: 'remote',
                                source: {
                                        read: {
                                                url: 'visitor-logs/getLogs'
                                        }
                                },
                                pageSize: 10,
                                saveState: {
                                        cookie: true,
                                        webstorage: true
                                },
                                serverPaging: true,
                                serverFiltering: true,
                                serverSorting: true
                        },
                        // layout definition
                        layout: {
                                theme: 'default', // datatable theme
                                class: '', // custom wrapper class
                                scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
                                height: 550, // datatable's body's fixed height
                                footer: false // display/hide footer
                        },

                        // column sorting
                        sortable: true,

                        pagination: true,

                        search: {
                                input: $('#generalSearch')
                        },
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
                        // columns definition
                        columns: [{
                                field: "visitorTagID",
                                title: "#",
                                sortable: false, // disable sort for this column
                                width: 40,
                                textAlign: 'center',
                                selector: {class: 'm-checkbox--solid m-checkbox--brand'}
                        }, {
                                field: "hostName",
                                title: "Host Name",
                                filterable: true, // disable or enable filtering
                                width: 150,
                        }, {
                                field: "visitorName",
                                title: "Visitor Name",
                                sortable: true // disable sort for this column
                        }, {
                                field: "telephoneNo",
                                title: "telephoneNo",
                                width: 100
                        }, {
                                field: "identificationNo",
                                title: "identification No",
                                sortable: 'asc'
                        }, {
                                field: "timeIN",
                                title: "timeIN",
								filterable: false,
                        }, {
                                field: "duration",
                                title: "Duration#",
                        }, {
                                field: "Actions",
                                width: 110,
                                title: "Actions",
                                sortable: false,
                                overflow: 'visible',
                                template: function (row) {
                                        var dropup = (row.getDatatable().getPageSize() - row.getIndex()) <= 4 ? 'dropup' : '';

                                        return '\<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Signout">\
                                                        <i class="la-sign-out"></i>\
                                                </a>';
                                }
                        }]
                });


        };

        return {
                // public functions
                init: function () {
                        demo();
                }
        };
}();

jQuery(document).ready(function () {
        DatatableRecordSelectionDemo.init();
});

