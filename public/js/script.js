function create() {
    $.get("{{ url('create') }}", {}, function(data, status) {
        console.log('faris',data);
        $("#pages").html(data);
        $("#exampleModal").modal('show');
    });
}