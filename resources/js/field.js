Nova.booting((Vue, router) => {
    Vue.component('index-french-datetime', require('./components/Index/FrenchDateTimeField'));
    Vue.component('detail-french-datetime', require('./components/Detail/FrenchDateTimeField'));
    Vue.component('form-french-datetime', require('./components/Form/FrenchDateTimeField'));
})
