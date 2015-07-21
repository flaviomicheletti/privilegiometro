//
// View que representa os resultados 
//
var ComparativoView = Backbone.View.extend({
  el: $('.comparativo'),
  render: function () {
    var me = this;
    this.model.set('id', total_view.$el.html());
    comparativo_model.fetch({
        success: function (modeloResposta) {
          // {posicoes: [1, 2, 3, 4], sua_posicao: 2};
          var graficoTemplate = _.template($("#grafico").html());
          $('#local-do-grafico').html(graficoTemplate(modeloResposta.get('grafico')));

          // {
          //   total: 100,
          //   grupos: [
          //     {total:10, posicao: 9},
          //     {total:20, posicao: 8},
          //     {total:30, posicao: 7},
          //   ]
          // }
          var estatisticaTemplate = _.template($("#estatistica").html());
          $('#local-da-estatistica').html(estatisticaTemplate(modeloResposta.get('estatistica')));

          me.$el.find('button').hide(1000);

        },
        error: function (model, xhr, options) {
          console.log("Erro: ComparativoModel", xhr);
        }
    });
  },
  events: {
      "click button": "render",
  }
});