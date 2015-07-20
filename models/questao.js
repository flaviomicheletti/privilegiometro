// Este modelo representa cada questão
//
// o `id` é equivalente ao identifador de cada questão
// `passo` é `1` para frente (up) e `-1` para trás (down)
// `movimento` é "frente" ou "trás"
// `pergunta` é a questão propriamente dita
var QuestaoModel = Backbone.Model.extend({
  defaults: {
    "id"       : 0,
    "passo"    : 0,
    "movimento": "permanecer",
    "pergunta" : 'pergunta ?'
  }
});