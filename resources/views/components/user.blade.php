@props(['size' => 24, 'color' => 'amarillo_lese'])

@php
switch ($color) {
    case 'amarillo_lese':
        $col = '#FFDB08';

        break;

    case 'white':
        $col = '#ECF0F1';

        break;

    default:
        $col = '#374151';

        break;
}
@endphp



<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="{{ $size }}" height="{{ $size }}"
    viewBox="0 0 172 172" style=" fill:#000000;">
    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
        <path d="M0,172v-172h172v172z" fill="none"></path>
        <g>
            <g>
                <circle cx="256" cy="256" transform="scale(0.33594,0.33594)" r="245" fill="#ffdb08"></circle>
                <circle cx="256" cy="198.799" transform="scale(0.33594,0.33594)" r="88.026" fill="#f7f5fb"></circle>
                <rect x="131.873" y="307.569" transform="scale(0.33594,0.33594)" width="248.254" height="93.657"
                    rx="46.829" ry="46.8285" fill="#f7f5fb"></rect>
                <path
                    d="M111.72415,164.20427c-8.30144,2.72698 -16.98488,4.11166 -25.72273,4.1018c-45.4557,0 -82.30469,-36.84898 -82.30469,-82.30469c-0.02987,-19.26004 6.72456,-37.91529 19.07789,-52.6918c6.02003,56.95145 40.49727,105.41379 88.94953,130.89469z"
                    fill="{{ $col }}"></path>
                <path
                    d="M71.59977,134.78619h-11.56633c-6.36253,-0.00023 -12.09856,-3.83274 -14.53388,-9.71074c-2.43532,-5.87801 -1.09044,-12.6442 3.40763,-17.1441c0.13102,-0.13102 0.26539,-0.26203 0.40312,-0.38633c6.45968,9.83271 13.93015,18.96278 22.28945,27.24117z"
                    fill="{{ $col }}"></path>
            </g>
        </g>
    </g>
</svg>
