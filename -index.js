// Como a coleção é apenas a declaração contendo um única linha
// preferi deixá-la junto com o código principal.
var QuestoesCollection = Backbone.Collection.extend({});

//
// Collections
//
var questoes_collection = new QuestoesCollection(arrQuestoes);

//
// Models
//
var total_model = new TotalModel();
var comparativo_model = new ComparativoModel();

//
// Views
//
var questoes_view    = new QuestoesView({model: total_model});
var total_view       = new TotalView({model: total_model});
var comparativo_view = new ComparativoView({model: comparativo_model});