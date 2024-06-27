<?php
/**
 * Nome applicativo: PAT
 * Licenza di utilizzo: GNU Affero General Public License» versione 3 e successive: https://spdx.org/licenses/AGPL-3.0-or-later.html
 */

defined('_FRAMEWORK_') OR exit('No direct script access allowed'); ?>

{{-- Pagina per gli Avvisi --}}

{% extends v1/layout/master %}

{{--  ************************************************ CONTENT ************************************************ --}}
{% block content %}

@php
    $anchorsNumber = 0;
@endphp

<main>
    <section class="my-5">
        <div class="container">
            <div class="row variable-gutters _reverse">
                <div class="col-lg-8">
                    <p id="generic-info" class="testo-blu anchor sr-only"
                       style="visibility: hidden; margin: unset;padding: unset;">Informazioni generali</p>
                    <div class="titolo mb-4">
                        <h1 class="page-title">{{ !empty($h1) ? $h1 : ( !empty($instance['object']) ? $instance['object'] : '') }}</h1>
                        @if(!empty($instance['type']))
                            <h5 class="text-secondary page-subtitle"><i class="fas fa-caret-right mr-1"></i>
                                {{e: $instance['type'] }}
                            </h5>
                        @endif
                        @if(!empty($instance['cig']))
                            Codice
                            CIG: {{e: $instance['cig'] }}
                            <br>
                        @endif
                    </div>

                    <h3 id="anchor5" class="testo-blu anchor page-subtitle">Altre informazioni sulla procedura</h3>
                    <div class="attributi">
                        @php
                            $anchorsNumber++;
                        @endphp
                        @if($instance['structure'])
                            <div class="attributo">
                                <span class="titolo">Ufficio:</span>
                                <a class="mr-2 text-muted"
                                   href="{{ siteUrl('page/40/details/'. (int)$instance['structure']['id'].'/'.urlTitle($instance['structure']['structure_name'])) }}">
                                    {{e: $instance['structure']['structure_name'] }}
                                </a>
                            </div>
                        @endif

                        @if($instance['rup'])
                            <div class="attributo">
                                <span class="titolo">RUP:</span>
                                <a class="mr-2 text-muted"
                                   href="{{ siteUrl('page/58/details/'. (int)$instance['rup']['id'].'/'.urlTitle($instance['rup']['full_name'])) }}">
                                    {{e: $instance['rup']['full_name'] }}
                                </a>
                            </div>
                        @endif

                        @if(!empty($instance['relative_measure']))
                            <div class="attributo">
                                <span class="titolo">Provvedimento:</span>
                                <a class="mr-2 text-muted"
                                   href="{{ siteUrl('page/9/details/'. (int)$instance['object_measure_id'].'/'.urlTitle($instance['relative_measure']['object'])) }}">
                                    {{e: $instance['relative_measure']['object'] }}
                                </a>
                            </div>
                        @endif

                        @if(!empty($instance['act_date']))
                            <div class="attributo">
                                <span class="titolo">Data dell'atto:</span>
                                <span class="mr-2 text-muted">
                                    {{date('d-m-Y|date'): $instance['act_date'] }}
                                </span>
                            </div>
                        @endif

                        @if(!empty($instance['activation_date']))
                            <div class="attributo">
                                <span class="titolo">Data di pubblicazione:</span>
                                <span class="mr-2 text-muted">
                                    {{date('d-m-Y|date'): $instance['activation_date'] }}
                                </span>
                            </div>
                        @endif

                        @if(!empty($instance['expiration_date']))
                            <div class="attributo">
                                <span class="titolo">Data di scadenza:</span>
                                <span class="mr-2 text-muted">
                                    {{date('d-m-Y|date'): $instance['expiration_date'] }}
                                </span>
                            </div>
                        @endif

                        @if(!empty($instance['relative_notice']))
                            <div class="attributo">
                                <span class="titolo">Procedura relativa:</span>
                                <a class="mr-2 text-muted"
                                   href="{{ siteUrl('page/110/details/'. (int) $instance['relative_notice']['id'].'/'.urlTitle($instance['relative_notice']['object'])) }}">
                                    {{e: $instance['relative_notice']['object'] }}
                                </a>
                            </div>
                        @endif

                        @if(!empty($instance['proceedings']))
                            <div class="mt-2">
                                <span style="font-weight: 600;">Procedure relative:</span>
                                <ul>
                                    @foreach($instance['proceedings'] as $proceeding)
                                        <li>
                                            <a class="mr-2 text-muted"
                                               href="{{ siteUrl('page/110/details/'. (int)$proceeding['id'].'/'.urlTitle($proceeding['object'])) }}">
                                                {{e: $proceeding['object'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(!empty($instance['relative_deliberation']) || !empty($instance['relative_foster']) || !empty($instance['other_proceedings']))
                            <div>
                                <span style="font-weight: 600;">Altre procedure di riferimento:</span>
                                <ul>
                                    @if(!empty($instance['relative_foster']))
                                        @foreach($instance['relative_foster'] as $foster)
                                            <li>
                                                <a class="mr-2 text-muted"
                                                   href="{{ siteUrl('page/110/details/'. (int) $foster['id'].'/'.urlTitle($foster['object'])) }}">
                                                    {{e: $foster['object'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @foreach($instance['relative_deliberation'] as $contestAct)
                                        <li>
                                            <a class="mr-2 text-muted"
                                               href="{{ siteUrl('page/110/details/'. (int) $contestAct['id'].'/'.urlTitle($contestAct['object'])) }}">
                                                {{e: $contestAct['object'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                    @foreach($instance['other_proceedings'] as $contestAct)
                                        <li>
                                            <a class="mr-2 text-muted"
                                               href="{{ siteUrl('page/110/details/'. (int)$contestAct['id'].'/'.urlTitle($contestAct['object'])) }}">
                                                {{e: $contestAct['object'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                </p>
                                @endif
                            </div>
                            @if($instance['details'])
                                @php
                                    $anchorsNumber++;
                                @endphp
                                <h3 id="anchor8" class="testo-blu anchor page-subtitle">Note</h3>
                                {{xss: $instance['details'] }}
                            @endif

                            @if(!empty($instance['notice_acts']))
                                @php
                                    $anchorsNumber++;
                                @endphp
                                <h3 id="anchor7" class="testo-blu anchor page-subtitle">
                                    Atti delle amministrazioni aggiudicatrici e degli enti aggiudicatori
                                </h3>
                                <ul>
                                    @foreach($instance['notice_acts'] as $notice_act)
                                        <li>
                                            <a class="mr-2 text-muted"
                                               href="{{ siteUrl('page/114/details/'. (int) $notice_act['id'].'/'.urlTitle($notice_act['object'])) }}">
                                                {{e: $notice_act['object'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            {{-- Attach List --}}
                            {% include v1/layout/partials/attach_list %}


                            @if(!empty($instance['relative_notice']))
                                @php
                                    $anchorsNumber++;
                                @endphp
                                <h3 id="anchor11" class="testo-blu anchor page-subtitle">Procedura relativa</h3>
                                <p>
                                    @if(!empty($instance['relative_notice']['expiration_date']))
                                        Data di
                                        scadenza: {{date('d-m-Y|date'): $instance['relative_notice']['expiration_date'] }}
                                        <br>
                                    @endif
                                    <a class="text-muted"
                                       href="{{ siteUrl('page/110/details/'. (int) $instance['relative_notice']['id'].'/'.urlTitle($instance['relative_notice']['object'])) }}">
                                        {{e: $instance['relative_notice']['object'] }}
                                    </a>
                                </p>
                            @endif

                            {{--  Created/Update Info --}}
                            {% include v1/layout/partials/created_updated_info %}

                    </div>
                </div>

                    @if($anchorsNumber > 4)
                        {{-- Index anchor --}}
                        {% include v1/layout/partials/anchor_index %}
                    @else
                        {{-- Right Menu --}}
                        {% include v1/layout/partials/right_menu %}
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>

@if($anchorsNumber > 4)
    {{-- Bottom Menu --}}
    {% include v1/layout/partials/bottom_menu %}
@endif

{% endblock %}
{{--  ************************************************ CSS ************************************************ --}}
{% block css %}
{% endblock %}
{{--  ************************************************ JAVASCRIPT ************************************************ --}}
{% block javascript %}

{% endblock %}