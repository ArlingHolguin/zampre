<div class="flex mx-2  flex-col min-w-0 mb-2 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">Pedidos</p>
                    <h5 class="mb-0 font-bold">
                        {{ $count }} realizados
                        <span
                            class="leading-normal text-sm font-weight-bolder text-gray-500"><br>{{ $entregadoUltimoMes }}
                            <small>Entregados últimos 30
                                dias</small>
                        </span>
                        {{-- Boton lese componente btn-action-lese --}}
                          {{-- Boton lese componente <components>btn-lese-link --}}
                       <x-btn-lese-link href="{{ route('admin.ordenes.index') }}">Pedidos</x-btn-lese-link>
                        
                    </h5>
                </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-lese-500 shadow-soft-2xl">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAFC0lEQVR4nO2b32sdRRTHP0lsvEEUTSrYJmgx9iZK39TkxVKMPyL4aDEt6IMvhmKhBX3Tlv4NhQpW39v4IKiI1LSKt6mNNi1YiYFGK0qt4I+AsQWleuPD7JK9Z8/endmZm2zhfuFA9u7M9/yYMz92ZgJttNFGG2200UYb+egG9gKzwDVgpWRyDTgLvBLZGhSbgQslcNJWzgObQjnffZM5H8scsCFEAPaWwJmisidEAGYF6YdAfwjiwOjH2Ja09YsQxH8J0jI6H2OARluX8yp0WJCuFKiznnCyt7OFhtwUCBmADmA3MA0sEX5AW4q4d7PGWSgN0dALnFLKtkpOAXd52OuEPMJbgNOeDhWR05FuV3udkUc42QLnbGWygL3OyCM8L97XgIcI2087Is6a0HWhgL3OaEa4Cagn3t3AfDe0CpsjHbG+uqLPKQC+s8A4jS39FXDVk7MZrgJfJp47gKd9CEMEIIkTnnw2kDqkDd6wTaFO4DdRdjS0MQq6I+nBLMsfCK3ANgAjotwS0BXamFbDpwvI1PsE+M+Db10QMgBr0f+DQ5urZdprZe7E9H9tJeaKD4AXyf50HcSM9NuBYeBe4I7o3TLwE7AAzGAa4bKvQTZjwHNKOVepA4fQA9wF7IqcqlvyxZwzwAQe2W0TgKMFnU7KqxncT2Ja1Jd/Hhhz9l4h0vCjp3GHFM4e4K0Ajks5AlTcw5BGBdiHWYklFVwPoOBuzCoyK63PAa8DO4Ah4LZIhqLf3ojKZHWXs0Cfj4H9wNcZ5B/7EGOc/1bhrQPHcFvobAWOowdiHthYxMAK2c6vAPuLkEboQW/5S8DDHryPAosK7ywFsnWfQpSUBz0M1fr8NNm7PS7oBU4q/EdciWQLfUSYrfGnFOOmCXSaE2EDehCcZgd5EDoQwLAu0lPdJcK0vEQv6e4wj8M6wWZadMUuwVkHHgnErWGE9MD4vG3lVgRgRnAeC8RbxSyXNUwJnTVb0rwAjGPW41eAZy34BmlsjTpm+vJFFfgZ+AU9CFsVvVtsiPMCcDnx7ooF3x7Bd87GiBzEzsecWUGYE7onQ5wM1RN/23SRx8Tz+03KjpHfV6vAZzRujt4DvKSUlbqkLSryMuAJ4HvgB+AZCz552WJHRrkxzDL7BubrToNs+ViOon9lPi7KzVnYG3wQ/F3wVZUysfNxGS0Irs6D+XZIlv3VxuDQAfhH8N2ulJmgcf9fBqGI80S6kuX/tjF4PQIA2UF4jWLOQ0kCYNMFYmhB0MTGeQjUBVxlm+CzHQRj5AXB1nlQBsG1uCEyKJ4XxPP2nPpTwAvAv8q7t1k9nbaB1CVtUeGbAQcFX9GF0E4aM+Ed3Dc+Zfa9bFPJNwDTgu9+ii+F4+7gkvYxqore+2wqLtPcwSKQH0PHHeqOUOzuwbtC5+e2Fd8jfAAmBEcds43VKoyS/hzeaVt5CPiDsAHowmxKJHkWMZsXodEHfCd0XcRx/BjApNCfhAkAmOWu5DpJ+C2xT0lnW97Uu2Z4Ez0IITKhD/3q3uEA3MFQwRxaSCMXMYNdUYySTvsV4AxwqwdvS7CR9HgQp+oUbrtFVUxX1Q5GvqE1Y0wQ9JG+lp8MxBxwALOUHWb1aGw4+u0g5rpe1tHYGUrsfIwK5tDCd+Elg3eYEqZ9M4yhdwlXuUiJRntXdGL2Amu4X5CoYRY5VvN82f/5AczW9TirV2S2sLqJsoy5q7CAuTx9Inq2xv9KCjdYLvnxrAAAAABJRU5ErkJggg==">
                </div>
            </div>
        </div>
    </div>
</div>
