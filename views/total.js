//
// View que representa o total do questionário
// exibida no rodapé da página (nav bar bottom)
//
var TotalView = Backbone.View.extend({
  el: $('.badge'),
  initialize: function () {
    this.model.on('change', this.render, this);
  },
  render: function () {
    // debug
    // console.log("TotalView: " + this.model.total());
    this.$el.html(this.model.total());
    return this;
  }
});