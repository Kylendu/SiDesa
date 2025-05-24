<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload AJAX</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

    <div id="message"></div>

    <form id="dokumenForm" enctype="multipart/form-data">
        @csrf
        <label for="surat">Nama Surat:</label>
        <input type="text" name="surat" required>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" rows="4"></textarea>

        <label for="file_path">Unggah File:</label>
        <input type="file" name="file_path" required>

        <button type="submit">Kirim via AJAX</button>
    </form>

    <script>
        $(document).ready(function(){
            $('#dokumenForm').on('submit', function(e){
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ url('ajaxupload') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(result){
                        $('#message').html('<p style="color:green;">' + result.message + '</p>');
                        $('#dokumenForm')[0].reset();
                    },
                    error:function(xhr){
                        $('#message').html('<p style="color:red;">Terjadi kesalahan saat upload</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
