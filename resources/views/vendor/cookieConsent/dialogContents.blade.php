<div class="js-cookie-consent cookie-consent py-2 pl-4 pr-2" style="z-index: 999; position:fixed; bottom:0; left:0; right:0; background:#333; color:#FFF;">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <a href="{{ url("rgpd") }}" class="mx-2 js-cookie-consent-agree cookie-consent__agree bo-rad-23 btn btn-outline-secondary">
        En savoir plus
    </a>
    <button class="js-cookie-consent-agree cookie-consent__agree bo-rad-23 btn btn-danger">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>
