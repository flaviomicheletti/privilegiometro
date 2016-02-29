//
// View que representa todas as questões
//
var QuestoesView = Backbone.View.extend({
  el: $('div#perguntas'),
  initialize: function () {
    this.render();
  },
  render: function () {

    // Gerando cada questão
    var me = this
    questoes_collection.forEach(function(model, index){

      // view aninhada
      var questao_view = new QuestaoView({model: model})
      me.$el.append(questao_view.render().el);

    });

    // eventos
    this.eventosRadios();
    return this;
  },
  // Evento click de cada controle radio
  eventosRadios: function () {
    var me = this;
    $('input[type=radio]').click(function(){
      var id       = $(this).prop('name');             // dados
      var passo    = $(this).val();                    // dados
      var escolhas = _.clone(me.model.get('escolhas')) // é preciso clonar
      escolhas[id] = parseInt(passo);                  // anotando
      me.model.set('escolhas', escolhas)               // atualizando o model
      //console.log(id + ": " + passo);                // debugando
    });
  }
});