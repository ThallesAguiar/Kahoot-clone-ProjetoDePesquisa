<script type="text/javascript">

    if (window.Notification && Notification.permission !== "denied"){
    Notification.requestPermission(function(status){
    let n = new Notification('TITULO', body:'Conteudo da notificação'})
    })
    }
</script>