## API Documentation

COSCUP 2011 website provide following **read-only** JSON-P APIs for your application to access. Since they are provided in JSON-P, they are useful in client-side web applications too &mdash; just add the `callback` parameter. You many also utilize Cross-Origin Resource Sharing if the browser targeted supports it. `Access-Control-Allow-Origin: *` is added to HTTP header to all URLs.

You may contact <timdream@gmail.com> if there is any questions regarding APIs.

### Navigation menu (`menu`)

* URL: `http://coscup.org/2011/api/menu/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/menu/).

Provide HTMLs of navigation menus of the three languages. Intend to be used internally on sub-domains of `coscup.org`. Hyper references (`href`) within do not come with hostnames, they are absolute path that begins with `/2011/`. The hostname to serve these pages are almost always `coscup.org`, with `ipv6.coscup.org` as exception should you would like to test IPv6 connectivity.

### Plurks mentioning COSCUP (`plurk`)

* URL: `http://coscup.org/2011/api/plurk/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/plurk/).

Simply a proxy of `http://www.plurk.com/API/PlurkSearch/search?query=COSCUP`. See [Plurk API 1.0 documentation](http://www.plurk.com/API#search) for detail. The search term is hard-coded and the refresh rate is limited to 10 min. You should access Plurk directly (with your own API key) if you need real-time data.

### Program (`program`)

* URL: `http://coscup.org/2011/api/program/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/program/).

A ~50KB JSON object that represents all the talks that will be given at COSCUP 2011. Your application **should** cache the result when possible (Web app may utilize `localStorage`; see [introduction](http://diveintohtml5.org/storage.html)). The talk array *may* ordered by time but not necessary &mdash; your application **must** be able to accept and process an unsorted list. Also, the placement of a talk on the list could vary as programs being updated &mdash; your application **must not** rely on the placement to identify the session.

Program time is represented in UNIX timestamp (seconds since 0:00 UT Jan 1st, 1970). Breaks can be determined by the following expression: `type === 0 && room === 0 && speaker === ''`.

**Important**: Language and topic types are optional information.

### Program topics and types (`program/types`)

* URL: `http://coscup.org/2011/api/program/types/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/program/types/).

List of topics in COSCUP 2011, referenced by program list with their `type`s. Noted that `id = 0` refer to **general sessions**, i.e. tea break, opening, closing, etc.

Topics are not expected to change from time to time.

### Venue rooms (`program/rooms`)

* URL: `http://coscup.org/2011/api/program/rooms/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/program/rooms/).

Name of the rooms in the COSCUP 2011 venue, referenced by program list with their `room`s. `id = 0` stands for keynotes and all-room sessions.

This list is not expected to change from time to time.

### Sponsors (`sponsors`)

* URL: `http://coscup.org/2011/api/sponsors/`. [Indented view](http://json-indent.appspot.com/indent?url=http://coscup.org/2011/api/sponsors/).

List of COSCUP 2011 sponsors. You **must** hard-code the order of sponsorship levels. The list of sponsors within each of the sponsorship level is ordered, when shown as whole, the order **must** be maintained; if only one of the sponsors could be shown, the one to be shown **must** picked randomly with following weighted factor:

> diamond:gold:silver:bronze:media = 10:5:2:1:0

The picking algorithm has been implemented in Javascript for COSCUP 2011 website mobile layout; the source code can be found [here](http://coscup.org/2011-theme/assets/script.js) in `mobileSponsorLogo()`.

Your application should update the list of sponsors at least once a day.
