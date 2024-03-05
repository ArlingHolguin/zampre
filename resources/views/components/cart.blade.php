@props(['size' => 35, 'color' => 'lese'])

@php
switch ($color) {
    case 'lese':
        $col = '#ea580c';

        break;

    case 'white':
        $col = '#ECF0F1';

        break;

    default:
        $col = '#374151';

        break;
}
@endphp



<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="{{ $size }}" height="{{ $size }}" viewBox="0 0 172 172"
    style=" fill:{{ $col }};">
    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
        <path d="M0,172v-172h172v172z" fill="none"></path>
        <g fill="#fff">
            <path
                d="M20.15625,147.54375l64.5,22.84375v0v0c0.13438,0 0.26875,0.13438 0.40313,0.13438v0v0c0.13437,0 0.13437,0 0.26875,0c0.13438,0 0.26875,0 0.5375,0v0h0.13438c0.26875,0 0.40313,0 0.67188,0v0v0h0.13437c0.13437,0 0.26875,-0.13438 0.5375,-0.13438v0l64.5,-22.84375c1.6125,-0.5375 2.6875,-2.15 2.6875,-3.7625v-66.1125l15.5875,-25.93438c0.13437,-0.26875 0.26875,-0.5375 0.26875,-0.67187v-0.13437c0.13438,-0.26875 0.13438,-0.5375 0.13438,-0.80625v0v0c0,-0.5375 0,-1.075 -0.13438,-1.6125v-0.13437v0v0c-0.13437,-0.40312 -0.40312,-0.80625 -0.67187,-1.20938c-0.40312,-0.5375 -1.075,-0.94063 -1.74687,-1.20937c0,0 0,0 -0.13438,0l-64.5,-22.84375c-1.74688,-0.67187 -3.7625,0.13438 -4.8375,1.74688l-12.49688,21.09688l-12.63125,-21.09687c-0.94063,-1.6125 -2.95625,-2.41875 -4.8375,-1.74687l-64.5,22.84375c-1.075,0.40312 -2.01562,1.34375 -2.41875,2.41875c-0.40313,1.075 -0.26875,2.41875 0.26875,3.35938l15.5875,25.93438v66.1125c0,1.74687 1.075,3.225 2.6875,3.7625zM33.59375,76.59375l52.40625,-18.54375l22.575,7.92813l-7.79375,2.6875c-0.94062,0.26875 -1.6125,0.94062 -2.15,1.74687l-14.37813,24.1875zM25.53125,82.2375l56.4375,20.02188v58.5875l-56.4375,-20.02187zM103.87188,31.7125l50.65938,18.00625l-11.2875,4.03125l-22.575,8.0625l-28.62188,-10.07812zM11.42188,51.86875l56.70625,-20.15625l11.95938,19.8875l-56.70625,20.15625z">
            </path>
        </g>
    </g>
</svg>
