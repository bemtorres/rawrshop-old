<script type="text/javascript" src="{{ asset('vendor/chat/floating-wpp.js') }}"></script>
<script type="text/javascript">
  $(function () {
    $('#myChat').floatingWhatsApp({
      phone: "{{ $t->presentRRSS()->redes('whatsapp') }}",
      popupMessage: "{{ $t->presentRRSS()->chat('popup_message') }}",
      message: "{{ $t->presentRRSS()->chat('message') }}",
      showPopup: true,
      // autoOpenTimeout: 15000,
      showOnIE: false,
      headerTitle: "{{ $t->presentRRSS()->chat('header_title') }}",
      // headerColor: 'crimson',
      // backgroundColor: 'crimson',
      size: "{{ $t->presentRRSS()->chat('size') }}px",
      position: "right",
      buttonImage: '<img src="/vendor/chat/whatsapp.svg" alt="img-whatsapp" />'
    });
  });
</script>