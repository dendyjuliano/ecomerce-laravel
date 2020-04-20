//sweat alert
const flashdata = $('.flash-data').data('flashdata');


if (flashdata) {
    Swal.fire({
        icon: 'success',
        title: 'Succesfull',
        text: 'Data succesfull ' + flashdata
    });
}

$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure',
        text: "deleted this data ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});
