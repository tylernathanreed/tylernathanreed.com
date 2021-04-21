(self.webpackChunk=self.webpackChunk||[]).push([[867,859,535,324],{5867:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>l});const n={props:{method:{type:String,default:"GET"},url:String},computed:{action:function(){return this.url},csrf:function(){return document.querySelector('meta[name="csrf-token"]').content},formMethod:function(){return"GET"!==this.hiddenMethod?"POST":"GET"},hiddenMethod:function(){return this.method.toUpperCase()},useHiddenMethod:function(){return"GET"!==this.hiddenMethod&&"POST"!==this.hiddenMethod}}};var i=s(1900);const r=(0,i.Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("form",{attrs:{method:t.formMethod,action:t.action}},[s("input",{attrs:{type:"hidden",name:"_token"},domProps:{value:t.csrf}}),t._v(" "),t.useHiddenMethod?s("input",{attrs:{type:"hidden",name:"_method"},domProps:{value:t.hiddenMethod}}):t._e(),t._v(" "),t._t("default")],2)}),[],!1,null,null,null).exports;var o=s(3859),a=s(2324);const u={components:{VForm:r,QuestionMultipleChoice:o.default,QuestionTrueFalse:a.default},props:{quiz:Object},methods:{answerProvided:function(t){var e=_.find($(this.$refs["quiz-form"].$el).serializeArray(),{name:"answers["+t+"]"});return!!e&&!!e.value}},computed:{current:function(){return 1},questionsCount:function(){return this.quiz.questions.length},questions:function(){return _.shuffle(this.quiz.questions)}},mounted:function(){var t=this;$(this.$refs.quiz).on("slide.bs.carousel",(function(e){if("left"==e.direction&&!t.answerProvided(e.from))return e.preventDefault(),void $(t.$refs["quiz-validation"]).show();$(t.$refs["quiz-validation"]).hide(),$(t.$refs["quiz-counter"]).text(e.to+1),$(t.$refs["quiz-progress-bar"]).attr("aria-valuenow",e.to+1).width(Math.round(e.to/t.questionsCount*100)+"%")})),$(this.$refs.quiz).on("slid.bs.carousel",(function(e){"left"!=e.direction||t.answerProvided(e.from)?(0!=e.to?$(t.$refs.back).removeClass("disabled"):$(t.$refs.back).addClass("disabled"),e.to==t.questionsCount-1?($(t.$refs.next).hide(),$(t.$refs.submit).show()):($(t.$refs.next).show(),$(t.$refs.submit).hide())):e.preventDefault()}))}};const l=(0,i.Z)(u,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("header",{class:"masthead bg-"+(t.quiz.color||"primary")+" text-white"},[s("div",{staticClass:"container d-flex flex-column align-items-center justify-content-center"},[s("h1",{staticClass:"masthead-heading text-center mb-0"},[t._v(t._s(t.quiz.name))]),t._v(" "),t._m(0),t._v(" "),s("div",{staticClass:"d-flex flex-column flex-sm-row align-items-center w-100"},[s("div",{staticClass:"masthead-avatar d-sm-block d-none"},[s("div",{class:(t.quiz.icon||"far fa-question-circle")+" w-100 h-100"})]),t._v(" "),s("div",{staticClass:"flex-1 masthead-subheading font-weight-light mb-0 ml-4 mt-4 mt-sm-0"},[t._v("\n                    "+t._s(t.quiz.description)+"\n                ")])])])]),t._v(" "),s("section",{staticClass:"page-section portfolio"},[s("div",{staticClass:"container"},[s("h2",{staticClass:"page-section-heading text-center text-uppercase text-secondary mb-0"},[t._v("Questions")]),t._v(" "),t._m(1),t._v(" "),s("div",{staticClass:"text-center mb-4"},[t._v("\n                Question "),s("span",{ref:"quiz-counter"},[t._v(t._s(t.current))]),t._v(" of "+t._s(t.questionsCount)+"\n            ")]),t._v(" "),s("div",{staticClass:"progress mb-4"},[s("div",{ref:"quiz-progress-bar",staticClass:"progress-bar progress-bar-striped progress-bar-animated",style:"width: "+Math.round((t.current-1)/t.questionsCount*100)+"%;",attrs:{role:"progressbar","aria-valuenow":t.current-1,"aria-valuemin":"0","aria-valuemax":t.questionsCount}})]),t._v(" "),s("v-form",{ref:"quiz-form",attrs:{method:"post"}},[s("div",{ref:"quiz",staticClass:"carousel slide text-xl",attrs:{id:"quiz","data-wrap":"false","data-interval":"false"}},[s("div",{staticClass:"carousel-inner"},t._l(t.questions,(function(e,n){return s("div",{key:n,class:"carousel-item"+(0==n?" active":"")},[s(e.view_template,{tag:"component",attrs:{number:n,question:e}}),t._v(" "),s("input",{attrs:{type:"hidden",name:"orders["+n+"]"},domProps:{value:e.default_order}})],1)})),0),t._v(" "),s("div",{ref:"quiz-validation",staticClass:"text-md text-danger text-center mb-2",staticStyle:{display:"none"}},[s("span",[t._v("An answer must be provided.")])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between"},[s("a",{ref:"back",staticClass:"btn btn-lg btn-primary disabled",attrs:{href:"#quiz",role:"button","data-slide":"prev"}},[s("span",[t._v("« Back")])]),t._v(" "),s("a",{ref:"next",staticClass:"btn btn-lg btn-primary",attrs:{href:"#quiz",role:"button","data-slide":"next"}},[s("span",[t._v("Next »")])]),t._v(" "),s("button",{ref:"submit",staticClass:"btn btn-lg btn-danger",staticStyle:{display:"none"},attrs:{type:"submit"}},[s("span",[t._v("Submit")])])])])])],1)])])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"divider-custom divider-light text-center"},[s("div",{staticClass:"divider-custom-line"}),t._v(" "),s("div",{staticClass:"divider-custom-icon"},[s("i",{staticClass:"fas fa-star"})]),t._v(" "),s("div",{staticClass:"divider-custom-line"})])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"divider-custom"},[s("div",{staticClass:"divider-custom-line"}),t._v(" "),s("div",{staticClass:"divider-custom-icon"},[s("i",{staticClass:"fas fa-star"})]),t._v(" "),s("div",{staticClass:"divider-custom-line"})])}],!1,null,null,null).exports},3859:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>i});const n={components:{Question:s(1535).default},props:{question:Object,number:Number},methods:{letter:function(t){return String.fromCharCode("A".charCodeAt(0)+t)}},computed:{options:function(){return _.shuffle(this.question.prompt.incorrect.concat([this.question.answer_key.exact]))}}};const i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("question",{attrs:{question:t.question,number:t.number}},[s("ul",{staticClass:"list-none mb-4"},t._l(t.options,(function(e,n){return s("li",[s("div",{staticClass:"checkbox d-inline-block"},[s("label",{staticClass:"cursor-pointer"},[s("input",{attrs:{type:"radio",name:"answers["+t.number+"]"},domProps:{value:e}}),t._v(" "),s("strong",{domProps:{textContent:t._s(t.letter(n)+")")}}),t._v(" "),s("span",{domProps:{innerHTML:t._s(e)}})])])])})),0)])}),[],!1,null,null,null).exports},1535:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>i});const n={props:{question:Object,number:Number},computed:{code:function(){return this.question.prompt.code&&this.question.prompt.code.replaceAll("\n","<br>").replaceAll("\t","&nbsp;&nbsp;")}}};const i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("div",{staticClass:"mb-2"},[s("strong",{domProps:{textContent:t._s(t.number+1)}}),t._v(" "),s("span",{domProps:{innerHTML:t._s(t.question.prompt.question)}})]),t._v(" "),t.question.prompt.code?s("code",{staticClass:"d-block border px-3 py-2 mb-3",domProps:{innerHTML:t._s(t.code)}}):t._e(),t._v(" "),t._t("default")],2)}),[],!1,null,null,null).exports},2324:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>i});const n={components:{Question:s(1535).default},props:{question:Object,number:Number},methods:{letter:function(t){return String.fromCharCode("A".charCodeAt(0)+t)}},computed:{options:function(){return["True","False"]}}};const i=(0,s(1900).Z)(n,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("question",{attrs:{question:t.question,number:t.number}},[s("ul",{staticClass:"list-none mb-4"},t._l(t.options,(function(e,n){return s("li",[s("div",{staticClass:"checkbox d-inline-block"},[s("label",{staticClass:"cursor-pointer"},[s("input",{attrs:{type:"radio",name:"answers["+t.number+"]"},domProps:{value:e}}),t._v(" "),s("strong",{domProps:{textContent:t._s(t.letter(n)+")")}}),t._v(" "),s("span",{domProps:{innerHTML:t._s(e)}})])])])})),0)])}),[],!1,null,null,null).exports}}]);
//# sourceMappingURL=867.js.map?id=b616dcf33c9e69151428