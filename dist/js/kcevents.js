const API_TOKEN = "0afef53c-41b9-4dd7-ba82-956c8596b2fe"; // APIトークン スマイルビルダーズ様
// const API_TOKEN = "6b50b26f-be6f-4b49-b465-0a6f0b9a4715"; // APIトークン　デモトークン

const API_ACCESS_KEY =
  "https://www.ie-miru.jp/api/v1/events?token=" + API_TOKEN; // APIアクセスキー
// const API_ACCESS_KEY_FINISHED =
//   "https://www.ie-miru.jp/api/v1/events?token=" +
//   API_TOKEN +
//   "&include_finished_events=true"; // APIアクセスキー 終了イベントも含む
const IMG_FOLDER = "./img/"; // imgフォルダのパス
const TOP_EVENTS_NUM = 4; // トップページのイベントの最大表示件数
const KC_SOURCE = "smile-builders-hiraya.com";
const HEADER_BACK_URL = "https://smile-builders-hiraya.com";
const Spinner = window.VueSimpleSpinner;

var utilityMixin = {
  methods: {
    formatDateStr(p_event_date) {
      let format_str = p_event_date.replace(/[0-9]{4}年/g, "");
      format_str = format_str.replace(/0+([0-9]+月)/g, "$1");
      format_str = format_str.replace(/0+([0-9]+日)/g, "$1");
      format_str = format_str.replace(/\)〜/g, "\)〜<br>");
      return format_str;
    },
    checkImg(p_url) {
      if (p_url) {
        return p_url;
      }
      return "https://www.ie-miru.jp/custom/images/base/photo_no_image_02.png";
    },

    checkDisplayAddressText(p_address, p_display_address_text) {
      // 表示用住所が入力されている場合はそちらを表示
      let ret_address = p_address;
      if (p_display_address_text) {
        ret_address = p_display_address_text;
      }
      return ret_address;
    },

  },
};

let componentTopEvents = {
  mixins: [utilityMixin],
  template: `
  <div class="kc-section">
    <spinner class="kc-spinner" v-show="isEventLoading"></spinner>
    <div class="l-content--percent p-content__list -top u-mb100" v-show="!isEventLoading">
      <a class="index-page__events-event -top is-vertical" v-for="event in events" :href="event.url + (event.url.indexOf('?') != -1 ? '&' : '?') + 'kc_source=' + KC_SOURCE + '&utm_store_kc=true' + '&header_back_url=' +  HEADER_BACK_URL + '&kc_embeded_type=api'">
          <div class="p-content__list__adImgWrap">
              <img :src="checkImg(event.image_url)" alt="">
          </div>
          <div class="index-page__events-event-content">
            <div class="p-content__list__labelWrap">
              <span class="p-content__list__label--type">{{event.event_type}}</span>
              <span class="p-content__list__label--reception">{{event.event_format_string}}</span>
            </div>
            <h4 class="index-page__events-event-name">{{event.name}}</h4>
            <p class="p-content__list__day" v-html="formatDateStr(event.event_open_date_from_to_string)"></p>
            <p class="p-content__list__eventAddress">{{checkDisplayAddressText(event.event_rough_address,event.display_address_text)}}</p>
            <p class="p-content__list__companyName">{{event.eventer_name}}</p>
          </div>
      </a>
    </div>
  </div>
  `,
  components: {
    spinner: Spinner,
  },
  data() {
    return {
      events: [],
      isEventLoading: true,
      enpr_eventer_id: 5701,
      // imgfolder: "",
    };
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData: function () {
      this.events = [];
      this.isEventLoading = true;
      axios
        .get(API_ACCESS_KEY)
        .then(
          function (response) {
            getEvents = response.data.events;
            for (normalItem in getEvents) {
              if (getEvents[normalItem].eventer_id === this.enpr_eventer_id) {
                this.events.push(getEvents[normalItem]);
              }
            }
            for (normalItem in getEvents) {
              if (getEvents[normalItem].eventer_id !== this.enpr_eventer_id) {
                this.events.push(getEvents[normalItem]);
              }
            }
            this.events = this.events.slice(0, TOP_EVENTS_NUM);
            this.isEventLoading = false;
          }.bind(this)
        )
        .catch(
          function (response) {
            console.log("error");
            console.log(response.data);
          }.bind(this)
        );
    },
  },
  created() {
    document.addEventListener("turbolinks:before-cache", this.onBrowserBack)
  },
  destroyed() {
    document.removeEventListener("turbolinks:before-cache", this.onBrowserBack)
  },
};




let componentTopAllEvents = {
  mixins: [utilityMixin],
  template: `
  <div class="kc-section">
    <spinner class="kc-spinner" v-show="isEventLoading"></spinner>
    <div class="l-content--percent p-content__list u-mb100" v-show="!isEventLoading">
      <a class="index-page__events-event is-vertical" v-for="event in events" :href="event.url + (event.url.indexOf('?') != -1 ? '&' : '?') + 'kc_source=' + KC_SOURCE + '&utm_store_kc=true' + '&header_back_url=' +  HEADER_BACK_URL + '&kc_embeded_type=api'">
          <div class="p-content__list__adImgWrap">
              <img :src="checkImg(event.image_url)" alt="">
          </div>
          <div class="index-page__events-event-content">
            <div class="p-content__list__labelWrap">
              <span class="p-content__list__label--type">{{event.event_type}}</span>
              <span class="p-content__list__label--reception">{{event.event_format_string}}</span>
            </div>
            <h4 class="index-page__events-event-name">{{event.name}}</h4>
            <p class="p-content__list__day" v-html="formatDateStr(event.event_open_date_from_to_string)"></p>
            <p class="p-content__list__eventAddress">{{checkDisplayAddressText(event.event_rough_address,event.display_address_text)}}</p>
            <p class="p-content__list__companyName">{{event.eventer_name}}</p>
          </div>
      </a>
    </div>
  </div>
  `,
  components: {
    spinner: Spinner,
  },
  data() {
    return {
      events: [],
      isEventLoading: true,
      enpr_eventer_id: 5701,
      // imgfolder: "",
    };
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData: function () {
      this.events = [];
      this.isEventLoading = true;
      axios
        .get(API_ACCESS_KEY)
        .then(
          function (response) {
            getEvents = response.data.events;
            for (normalItem in getEvents) {
              if (getEvents[normalItem].eventer_id !== this.enpr_eventer_id) {
                this.events.push(getEvents[normalItem]);
                // if (this.events.length >= TOP_EVENTS_NUM) {
                //   break;
                // }
              }
            }
            this.isEventLoading = false;
          }.bind(this)
        )
        .catch(
          function (response) {
            console.log("error");
            console.log(response.data);
          }.bind(this)
        );
    },
  },
  created() {
    document.addEventListener("turbolinks:before-cache", this.onBrowserBack)
  },
  destroyed() {
    document.removeEventListener("turbolinks:before-cache", this.onBrowserBack)
  },
};



let componentAllEvents = {
  mixins: [utilityMixin],
  template: `
  <div class="kc-section">
    <ul class="c-term__list">
        <li class="c-term__item--all">
          <button class="c-term__item__link" @click="clickEventer('')">すべて</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(3662)">ケイエイツー</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5707)">ウッドペッカー</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5705)">アイランドホーム</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(3666)">旭住宅</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5704)">クオリティホーム</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5706)">栄匠健</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5703)">Lifeplushome</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5701)">スマイルビルダーズ</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5708)">NEO DESIGN HOME</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5709)">一条工務店</button>
        </li>
        <li class="c-term__item">
          <button class="c-term__item__link" @click="clickEventer(5702)">三洋ハウス</button>
        </li>
    </ul>
    <spinner class="kc-spinner" v-show="isEventLoading"></spinner>
    <div class="l-content--percent p-content__list u-mb100" v-show="!isEventLoading">
      <a class="index-page__events-event is-vertical" v-for="event in events" :href="event.url + (event.url.indexOf('?') != -1 ? '&' : '?') + 'kc_source=' + KC_SOURCE + '&utm_store_kc=true' + '&header_back_url=' +  HEADER_BACK_URL + '&kc_embeded_type=api'">
          <div class="p-content__list__adImgWrap">
              <img :src="checkImg(event.image_url)" alt="">
          </div>
          <div class="index-page__events-event-content">
            <div class="p-content__list__labelWrap">
              <span class="p-content__list__label--type">{{event.event_type}}</span>
              <span class="p-content__list__label--reception">{{event.event_format_string}}</span>
            </div>
            <h4 class="index-page__events-event-name">{{event.name}}</h4>
            <p class="p-content__list__day" v-html="formatDateStr(event.event_open_date_from_to_string)"></p>
            <p class="p-content__list__eventAddress">{{checkDisplayAddressText(event.event_rough_address,event.display_address_text)}}</p>
            <p class="p-content__list__companyName">{{event.eventer_name}}</p>
          </div>
      </a>
    </div>
  </div>
  `,
  components: {
    spinner: Spinner,
  },
  data() {
    return {
      events: [],
      selected_eventer_id: '',
      isEventLoading: true,
      // imgfolder: "",
    };
  },
  mounted() {
    this.getData();
  },
  methods: {
    clickEventer(p_eventer_id) {
      this.selected_eventer_id = p_eventer_id;
      this.getData();
    },
    getData: function () {
      this.events = [];
      this.isEventLoading = true;
      axios
        .get(API_ACCESS_KEY)
        .then(
          function (response) {
            getEvents = response.data.events;
            for (normalItem in getEvents) {
              if (getEvents[normalItem].eventer_id === this.selected_eventer_id || !this.selected_eventer_id) {
                this.events.push(getEvents[normalItem]);
                // if (this.events.length >= TOP_EVENTS_NUM) {
                //   break;
                // }
              }
            }
            this.isEventLoading = false;
          }.bind(this)
        )
        .catch(
          function (response) {
            console.log("error");
            console.log(response.data);
          }.bind(this)
        );
    },
  },
  created() {
    document.addEventListener("turbolinks:before-cache", this.onBrowserBack)
  },
  destroyed() {
    document.removeEventListener("turbolinks:before-cache", this.onBrowserBack)
  },
};





var kcapp = new Vue({
  el: "#kcapp",
  components: {
    "top-events": componentTopEvents,
    "all-events": componentAllEvents,
  },
  data: {},
  mounted() { },
  beforeDestroy() { },
  methods: {},
});


var kcapp2 = new Vue({
  el: "#kcapp2",
  components: {
    "top-all-events": componentTopAllEvents,
  },
  data: {},
  mounted() { },
  beforeDestroy() { },
  methods: {},
});




