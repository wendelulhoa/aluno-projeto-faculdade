<script>
    $('form').on('submit',function(e){
        e.preventDefault();
        $('#global-loader').addClass('global-see');
        $.ajax({
            url: "{{ Route('aluno-create') }}",
            method:'POST',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#global-loader').removeClass('global-see');
                $('#global-loader').addClass('global-hide');
                toastr.success("Cadastrado com sucesso");
            },
            error: function(data){
                toastr.error("ocorreu um erro.")
            }
        });
    });
</script>