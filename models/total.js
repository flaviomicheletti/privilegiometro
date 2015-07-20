//
// Modelo que representa o total do questionário (resultado)
//
var TotalModel = Backbone.Model.extend({
  defaults: {
    "escolhas": [],
  },
  total: function() {
    var soma     = 0;
    var escolhas = this.get('escolhas');
    escolhas.forEach(function(element) {
        soma += element;
    });
    return soma;
  }
});