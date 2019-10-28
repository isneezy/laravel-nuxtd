/* eslint-disable import/no-duplicates */
import Vue from "vue";
import * as rules from "vee-validate/dist/rules";
import {
    configure,
    extend,
    ValidationObserver,
    ValidationProvider
} from "vee-validate";

configure({ mode: "eager" });

Object.keys(rules).forEach(name => {
    /* eslint-disable-next-line import/namespace */
    extend(name, rules[name]);
});

Vue.mixin({
    components: { ValidationObserver, ValidationProvider }
});
