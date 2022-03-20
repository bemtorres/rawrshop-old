class Carrito {
  constructor(clave) {
    this.clave = clave || "productos";
    this.productos = this.all();
  }

  add(producto) {
    if (!this.find(producto.id)) {
      this.productos.push(producto);
      this.save();
    }
  }

  remove(id) {
    const indice = this.productos.findIndex(p => p.id === id);
    if (indice != -1) {
      this.productos.splice(indice, 1);
      this.save();
    }
  }

  save() {
    localStorage.setItem(this.clave, JSON.stringify(this.productos));
  }

  all() {
    const productosCodificados = localStorage.getItem(this.clave);
    return JSON.parse(productosCodificados) || [];
  }

  find(id) {
    return this.productos.find(producto => producto.id === id);
  }

  count() {
    return this.productos.length;
  }

  reset() {
    localStorage.clear();
  }
}

class WhatsappPhone {
  constructor(phone, message) {
    this.phone = phone;
    this.message = message;
  }

  mobilecheck() {
    var check = false;
    (function(a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
  }

  send() {
    var apilink = 'http://';
    apilink += this.mobilecheck() ? 'api' : 'web';
    apilink += '.whatsapp.com/send?phone=' + this.phone + '&text=' + encodeURI(this.message);
    window.open(apilink);
  }
}

const c = new Carrito();

function findProduct(data) {
  var rawrshop = document.getElementById('dinobox_request');
  fetch(rawrshop.dataset.productFind, {
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      method: 'POST',
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(function(resp) {
      if (resp.status == 200) {
        c.add(resp.result.product);
        loadTable();
      }
    })
    .catch(function(error) {
      console.log(error);
    });
}

function loadTable() {
  var productos = c.all();
  var total = 0;
  var format = {
    precision: 0,
    decimal: ',',
    separator: '.',
  }
  $("#btn_cart_open").hide();
  $("#btn_cart").show();

  $("#cart_body").html("");
  for (var i = 0; i < productos.length; i++) {
    total += productos[i].price_origin;
    var tr = `<tr>
        <td>` + productos[i].product_name + ` <small class="me-2"><b> - ` + productos[i].nombre + `</b></small></td>
        <td class="text-end">` + currency(productos[i].price_origin, format).format() + `</td>
        <td>
          <button class="btn btn-outline-danger delete_cart" id="delete_cart" data-id="` + productos[i].id + `">
            <i class="fa fa-trash text-danger"></i>
          </button>
        </td>
      </tr>`;
    $("#cart_body").append(tr);

    blockedButton(productos[i]);
  }

  $("#cart_price_total_one").html(currency(total, format).format());
  $("#cart_price_total_two").html(currency(total, format).format());
  $("#cart_price_total_original").html(currency(total, format).format());

  $("#button_pay").attr("disabled", true);
  if (total > 0) {
    $("#button_pay").removeAttr("disabled");
  }
}

function blockedButton(prod) {
  let button_id = $("#btn_cart_open").data("id");
  if (button_id == prod.id) {
    $("#btn_cart_open").show();
    $("#btn_cart").hide();
  }
}

$(".btn_cart").click(function() {
  let data = {
    id: parseInt($(this).data("id")),
    code: $(this).data("code")
  }
  findProduct(data);
});

loadTable();

$(document).on('click', '.delete_cart', function() {
  let id = parseInt($(this).data("id"));
  c.remove(id);
  loadTable();
});

$(document).on('click', '#button_pay', function() {
  var rawrshop = document.getElementById('dinobox_request');
  var productos = c.all();
  var total = 0;
  var format = {
    precision: 0,
    decimal: ',',
    separator: '.',
  }
  let m = "¡Hola! Te envío mi pedido:\n\n";
  for (var i = 0; i < productos.length; i++) {
    total += productos[i].price_origin;
    m += "*1* *unidad(es)* - *Código: " + productos[i].codigo + "* - Precio: " + currency(productos[i].price_origin, format).format() + " " + productos[i].product_name + " " + productos[i].nombre + "\n\n";
  }
  m += `*TOTAL ` + currency(total, format).format() + `*`;
  // c.reset();
  // loadTable();

  const Wp = new WhatsappPhone(rawrshop.dataset.phone, m);
  Wp.send();
});