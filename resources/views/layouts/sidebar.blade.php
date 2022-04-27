<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>
    .nunito {
        font-family: 'nunito', font-sans;
    }
    
    .border-b-1 {
        border-bottom-width: 1px;
    }
    
    .border-l-1 {
        border-left-width: 1px;
    }
    
    hover\:border-none:hover {
        border-style: none;
    }
    
    #sidebar {
        transition: ease-in-out all .3s;
        z-index: 9999;
    }
    
    #sidebar span {
        opacity: 0;
        position: absolute;
        transition: ease-in-out all .1s;
    }
    
    #sidebar:hover {
        width: 15em;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        /*shadow-2xl*/
    }
    
    #sidebar:hover span {
        opacity: 1;
    }
</style>

<div id="sidebar" class="h-screen menu bg-white text-white px-3 items-center nunito fixed shadow hidden sm:block">

    

    <ul class="list-reset ">

        @foreach ([
            ['route' => 'dashboard', 'title' => 'Dashboard','icon'=>'fas fa-home fa-fw'],
            ['route' => 'pembimbingan', 'title' => 'Dosen','icon'=>'fas fa-chalkboard-teacher fa-fw'],
            ['route' => 'mahasiswa', 'title' => 'Mahasiswa','icon'=>'fa fa-users fa-fw'],
            ['route' => 'jurusan', 'title' => 'Jurusan','icon'=>'fa fa-envelope fa-fw'],
            ['route' => 'matakuliah', 'title' => 'Matakuliah','icon'=>'fa fa-envelope fa-fw'],
        ] as $item)
            <li class="my-2 md:my-0">
                <a href="{{ route($item['route']) }}" class="block py-1 md:py-3  align-middle text-gray-600 no-underline hover:text-green-400">
                    <i class="{{$item['icon']}} {{request()->routeIs($item['route'])?'text-green-400':''}} "></i>
                    <span class="w-full inline-block ml-3 pb-1 md:pb-0 text-sm">{{$item['title']}}</span>
                </a>
            </li>
        @endforeach

    </ul>

</div>