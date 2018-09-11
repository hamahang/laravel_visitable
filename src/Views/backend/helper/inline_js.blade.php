<script>
    window['like_grid_columns'] = [
        {
            width: '5%',
            data: 'id',
            title: 'ردیف',
            searchable: false,
            sortable: false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'id',
            name: 'id',
            title: 'آی دی',
            visible: false
        },
        {
            data: 'ip',
            name: 'ip',
            title: 'آی پی',
        },
        {
            data: 'target_type_name',
            name: 'target_type_name',
            title: 'نام مجموعه',
        },
        {
            data: 'target_value_name',
            name: 'target_value_name',
            title: 'نام آیتم',
        },
        {
            width: '25%',
            data: 'user_id',
            name: 'user_id',
            title: 'ایجاد شده توسط',
            mRender: function (data, type, full) {
                if (full.user && full.user.name) {
                    return '<span>' + full.user.name + '<span>';
                }
                else
                    return '<span><span>';
            }
        },
        {
            data: 'created_at',
            name: 'created_at',
            title: 'تاریخ ایجاد',
        },
    ];
    $(document).ready(function () {
        datatable_load_fun();
    });

    function datatable_load_fun() {
        var getTagRoute = '{{ route('LVS.getVisitsGrid') }}';
        dataTablesGrid('#visitManagerGridData', 'visitManagerGridData', getTagRoute, like_grid_columns,false);
    }


</script>