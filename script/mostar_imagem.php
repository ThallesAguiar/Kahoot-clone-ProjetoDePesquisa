 <!--SCRIPT PARA MOSTRAR IMAGEM -->
    <script>
        function previewImagem() {
            var imagem = document.querySelector('input[name=foto]').files[0];
            var preview = document.querySelector('img');

            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (imagem) {
                reader.readAsDataURL(imagem);
            } else {
                preview.src = "";
            }
        }
    </script>
    <!--/.SCRIPT PARA MOSTRAR IMAGEM -->