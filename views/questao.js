//
// View que representa cada questão
//
var QuestaoView = Backbone.View.extend({
  tagName: "div",
  template: _.template($("#questao").html()),
  initialize: function () {
    this.render();
  },
  render: function () {

    // criar propriedade `passo`
    // pois ela ainda não existe no model
    this.model.set('passo', this.passo(this.model));

    // passo  1 = 'panel panel-success'
    // passo -1 = 'panel panel-danger'
    this.$el.addClass(this.classConformePasso(this.model.get('passo')));

    // criar cada questão
    this.$el.html(this.template(this.model.attributes));
    return this;
  },
  // retorna o passo segundo o movimento
  passo: function (model) {
    if (model.get('movimento') == "frente") {
      return 1;
    } else {
      return -1;
    }
  },

  // Retorna a css da div principal de cada questão
  classConformePasso: function (passo) {
    if (passo == 1) {
      return "panel panel-success";
    } else {
      return "panel panel-danger";
    }
  }
});