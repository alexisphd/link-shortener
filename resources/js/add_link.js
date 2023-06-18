
    $(document).ready(function () {
    $('#shorting_button').on('click', function (){
    var link = $('#full_link').val().trim();
    if (link) {
    $.ajax({
    url: '/store',
    type: "POST",
    data: {full_link: link},
    headers: {
    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
},
    success: function (data) {
    $('#links_table > tr').remove()
    if(data) {
    data.forEach(function (key, value) {
    $('#links_table>tbody:first').after(
    '<tr> <td>' + key['id'] + '</td><td>' + key['full_link'] + '</td><td>' +
    key['short_link'] + '</td></tr>');
});
}
    else alert('Такая ссылка уже существует')
},
    error: function (msg) {
    alert('Проверьте введенную ссылку');
}
});
} else alert("Введите данные");

    $('#full_link').val('');

})
});