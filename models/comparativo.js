//
// Modelo que representa os dados enviados ao servidor
//
var ComparativoModel = Backbone.Model.extend({
  sync: function (method, model, options) {
    options || (options = {});

    switch (method) {
      case 'read':
        options.url = 'backend/?id=' + this.id;
        break;
      case 'create':
      case 'update':
      case 'delete':
    }
    return Backbone.sync.apply(this, arguments);  
  }
});