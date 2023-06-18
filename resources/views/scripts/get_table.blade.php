<script>
    $(document).ready(function () {
        $.ajax({
            url: '{{ route("show.links") }}',
            type: "POST",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('#links_table' > 'tbody').empty()
                data.forEach(function (key, value) {
                    $('#links_table>tbody:first').after(
                        '<tr> <td>' + key['id'] + '</td><td>' + key['full_link'] + '</td><td>' +
                        key['short_link'] + '</td></tr>');
                });
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
</script>