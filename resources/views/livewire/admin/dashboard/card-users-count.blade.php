<div class="flex mx-2  flex-col min-w-0 mb-2 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Usuarios</p>
                    <h5 class="mb-0 font-bold">
                        {{$count}} registrados
                        <span class="leading-normal text-sm font-weight-bolder text-gray-500"><br>{{$countUltimoMes}} <small>últimos 30 dias</small> </span><br>
                       {{-- Boton lese componente <components>btn-lese-link --}}
                       <x-btn-lese-link href="/">Usuarios</x-btn-lese-link>
                    </h5>
                </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAE6UlEQVR4nO2a228VVRSHv3PgaMVSE3qIARNFH2rFkngtRkJEQIUYgZCCkRf9J4gPSok+1DfEGPUPsEYrMZHEmKCByMUGBPEBTAltVIi3J1FqvNKpD3tOMmfNnpm95uyp02S+ZCdnn5m1fnvWvsy+DFRUVFRUVFRUVFRUVLjTAIaAUWAC+B2YDn+Phtca81gvla3ARWA2I10M751veonUgVccChJNATAS2pZdLxNtYaJpZB7opbIVE92oyJ/APmAQuDFMg8Cr4TVZM1tKrJdKg3gfvATcnWIzEN4j+6jLQDXXepkMEa+JtMJECyVrZqiEepmMCqf7FLb7he3bJdTL5IJw+qDCdrWwvVBCvUymhdNuhW23sJ0um57L+3KhogBZ/l30Zj3qzWgNbPwk8nc5Fyd+r/Rl43uPej9kGbgE4AuR3+VcHHgmw5eNsx71vlTYJrKD+GtpwMFuFfCXsN3uYLfFo95TDnaZNIBJ4fhSRqFWEZ+YTOI2njQwq7xO9b7G4wpxM/ap6X7gIczo2x3+fo14TQTAJoXe4x70NuZ81kReEiKa9HIOvRc70Hshh54Te4nXTFoKMIGr5dDaBPym0GqlX9G1NjXbgL8dCjIDPJvD/xrglIP/rHQKeDiHfiIbgHeAPxSFuAZ8DDzp4P86zB7ANYV/F/2R0HduBoBDHgpzFLg/QaMH+CzBLgA+B54HHgGWAzdg9gP6gXXAHuAMyd3zCLBY++A1YBi/NfIPsJv2MaGJmbDYutAo0Kcocx8whj0Qp4Elro56gIMJDxFgor0HE/07MbXRBdwc/rcbOJ5QkFngAKZZNrDX/Dd01n8HgSmL38M4zEUWYZqc7cHfQ1cjKzG1aAvER8Bblv+PATcpNJJYgnlg6T91f6ERFkwaTaJbl0vWEp+pJY0TizJ8SZs0GsSDEJDSukYsAodR9J0UmsC4xX8rfQssdfCjCQBAL/HucAbLQvAB4F/iD+/zxGUxcBJ7AB5z9KENAJidItkN2xZmNeArccMkfmpesgy4IrQ+UNjnCQCYt0PU7lD04mZxMaCzPp9GD+Z1GNW7T2GfNwB9tLeCGeDW1sVPhdN3FY61bBdap5X2eQMA8fnGc3XgFsw0NyqwV+lYg1yofFigluSgyK+pA+tpn5mdxZyqFMU9In+yQC3JcZG/dyEmAFFklHxzu8hPiLy2WWfdH63cH8W1pXXMbC2KjJJvekT+l4L1osgANOuY+XuUzK1kz3Ry7qBFbswsqGNmaFF+LrgQ8rRmecF6UZaJ/NU6ZnOxFkkux1edcFnkZQBqGUmiuV9qXS7kU5IM5KC3dg61pdbE/xGAEyJf6IdNgm0iX/SAb+UO2qekAbo9Bl9T4QC4TWHvlRO0P8SYwjZvAA4Iu6MKW+88LQoTYLaxXPC1HN6hKK93FmDO7qIFmsJt+e1jQ+QcBX1LqGED9t2nrA0Y7ZbYEeKtbV3uUnvmTexB6PXguxf7pujrHnx7owv7FtkUpt/mZTX2bfFx4PoO/BZCk/h40GqqY+gPRt7Hvg1/Hj8tqxCaJG+Wtg5ihoFHMcdhrU9l+8P/hjG7PUkHMeOU+OFbdAFvYH+AvCnA9PnSNfs01mPvEtp0jhKN9lrqwE7MMZn2g4xjmEmO03s+z5cbc80K4AnMSq4/zLeOuq9ijtwmMAubT4DvNM7/A4N2QtMEhhryAAAAAElFTkSuQmCC">
                </div>
            </div>
        </div>
    </div>
</div>