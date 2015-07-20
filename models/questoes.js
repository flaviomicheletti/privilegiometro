// Array com as 35 questões que compõem a atividade
//
// No arquivo `index.js` cada item sará transformado em um modelo
// no momento de instanciação da coleção, veja trecho de código:
//
// `var questoes_collection = new QuestoesCollection(arrQuestoes);`
//
var arrQuestoes = [
  {
    id: 1,
    movimento: "trás",
    pergunta: 'Se os seus pais trabalharam noites e finais de semana para sustentar a sua família, dê uma passo para trás.'
  },
  {
    id: 2,
    movimento: "frente",
    pergunta: 'Se você consegue andar pelo mundo sem sentir medo de assédio sexual, dê uma passo para frente.'
  },
  {
    id: 3,
    movimento: "frente",
    pergunta: 'Se você consegue demonstrar afeto pelo seu companheiro romântico em público sem sentir medo de ridicularização ou violência, dê uma passo para frente.'
  },
  {
    id: 4,
    movimento: "trás",
    pergunta: 'Se você já foi diagnosticado com alguma doença ou deficiência mental/física, dê uma passo para trás'
  },
  {
    id: 5,
    movimento: "trás",
    pergunta: 'Se a língua primária falada na sua casa quando você cresceu não era o português, dê uma passo para trás.'
  },
  {
    id: 6,
    movimento: "frente",
    pergunta: 'Se você veio de um ambiente familiar que te apoiava, dê uma passo para frente.'
  },
  {
    id: 7,
    movimento: "trás",
    pergunta: 'Se você alguma vez já teve que mudar seu sotaque ou trejeitos para ganhar credibilidade, dê uma passo para trás.'
  },
  {
    id: 8,
    movimento: "frente",
    pergunta: 'Se você pode ir a qualquer lugar do país e facilmente encontrar produtos para o seu tipo de cabelo ou cosméticos que sejam da cor da sua pele, dê uma passo para frente.'
  },
  {
    id: 9,
    movimento: "trás",
    pergunta: 'Se você já teve vergonha das suas roupas ou da sua casa quando crescia, dê uma passo para trás.'
  },
  {
    id: 10,
    movimento: "frente",
    pergunta: 'Se você pode cometer erros e ninguém atribuir seu comportamento ao seu gênero ou raça, dê uma passo para frente.'
  },
  {
    id: 11,
    movimento: "frente",
    pergunta: 'Se você pode legalmente casar com a pessoa que ama, independente de onde você mora, dê uma passo para frente.'
  },
  {
    id: 12,
    movimento: "frente",
    pergunta: 'Se você nasceu no Brasil, dê uma passo para frente.'
  },
  {
    id: 13,
    movimento: "trás",
    pergunta: 'Se você ou seus pais já se divorciaram, dê uma passo para trás.'
  },
  {
    id: 14,
    movimento: "frente",
    pergunta: 'Se você já sentiu como se tivesse acesso adequado à comida saudável enquanto crescia, dê uma passo para frente.'
  },
  {
    id: 15,
    movimento: "frente",
    pergunta: 'Se você estava razoavelmente certo de que seria contratado num trabalho graças às suas habilidades e qualificações, dê uma passo para frente.'
  },
  {
    id: 16,
    movimento: "frente",
    pergunta: 'Se você nunca pensaria duas vezes antes de chamar a polícia quando algum problema acontecer, dê uma passo para frente.'
  },
  {
    id: 17,
    movimento: "frente",
    pergunta: 'Se você pode ver um médico sempre que tem necessidade, dê uma passo para frente.'
  },
  {
    id: 18,
    movimento: "frente",
    pergunta: 'Se você se sente confortável sendo emocionalmente aberto e expansivo, dê um passo para frente.'
  },
  {
    id: 19,
    movimento: "trás",
    pergunta: 'Se você alguma vez já foi a única pessoa do seu gênero/raça/status social/orientação sexual em uma classe ou num local de trabalho, dê uma passo para trás.'
  },
  {
    id: 20,
    movimento: "trás",
    pergunta: 'Se você precisou de bolsa para custear seus estudos, dê uma passo para trás.'
  },
  {
    id: 21,
    movimento: "frente",
    pergunta: 'Se você tem folga nos feriados da sua religião, dê um passo pra frente.'
  },
  {
    id: 22,
    movimento: "trás",
    pergunta: 'Se você teve que trabalhar durante os anos de estudo, dê uma passo para trás.'
  },
  {
    id: 23,
    movimento: "frente",
    pergunta: 'Se você se sente confortável de andar pra casa sozinho, dê uma passo para frente.'
  },
  {
    id: 24,
    movimento: "frente",
    pergunta: 'Se você alguma vez já viajou pra fora do país, dê uma passo para frente.'
  },
  {
    id: 25,
    movimento: "trás",
    pergunta: 'Se você já sentiu como se não existisse uma representação real do seu grupo racial, da sua orientação sexual, gênero ou deficiência na mídia, dê uma passo para trás.'
  },
  {
    id: 26,
    movimento: "frente",
    pergunta: 'Se você sentiu confiança de que seus pais poderiam de dar apoio financeiro se você passasse por alguma dificuldade, dê uma passo para frente.'
  },
  {
    id: 27,
    movimento: "trás",
    pergunta: 'Se você já sofreu bullying ou foi feito de piada baseado em algo que você não podia mudar, dê uma passo para trás.'
  },
  {
    id: 28,
    movimento: "frente",
    pergunta: 'Se tinham mais de 50 livros na casa que você cresceu, dê uma passo para frente.'
  },
  {
    id: 29,
    movimento: "frente",
    pergunta: 'Se você estudou a cultura ou história dos seus ancestrais na escola fundamental, dê uma passo para frente.'
  },
  {
    id: 30,
    movimento: "frente",
    pergunta: 'Se os seus pais ou responsáveis frequentaram a faculdade, dê uma passo para frente.'
  },
  {
    id: 31,
    movimento: "frente",
    pergunta: 'Se você já fez uma viagem em família, dê uma passo para frente.'
  },
  {
    id: 32,
    movimento: "frente",
    pergunta: 'Se você pode comprar roupas novas ou ir a um jantar quando quiser, dê uma passo para frente.'
  },
  {
    id: 33,
    movimento: "frente",
    pergunta: 'Se você já conseguiu um emprego por ser amigo ou familiar de alguém, dê uma passo para frente.'
  },
  {
    id: 34,
    movimento: "trás",
    pergunta: 'Se algum dos seus pais já esteve desempregado, não por opção, dê uma passo para trás.'
  },
  {
    id: 35,
    movimento: "trás",
    pergunta: 'Se você já esteve desconfortável com uma piada ou um regimento relacionado à sua raça, gênero, aparência ou orientação sexual, mas se sentiu inseguro de confrontar a situação, dê uma passo para trás.'
  }
]
