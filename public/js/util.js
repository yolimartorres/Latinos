function travelTo(sender) {
    window.location.href = $(sender).data('href');
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});