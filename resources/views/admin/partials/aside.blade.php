<section class="aside-menu">
    <div class="aside-container w-100 h-100 mt-5 ">
      <div class="row flex-column flex-nowrap justify-content-between text-white aside-font h-100 mt-3">
        <div class="col h-100 ">
          <ul class="nav flex-column align-items-center  mt-4">
            <li class="nav-item  mb-2 ">
                <div class="row row-cols-2 element">
                    <div class="col-1"><div class="aside-icon"><i class="fa-solid fa-house"></i></div></div>
                    <div class="col-3"><span class="ms-1 hide d-md-block">
                        <a href="{{ route('admin.project.index')}}">Progetti</a>
                    </span></div>
                </div>

            </li>
            <li class="nav-item mb-2">
                <div class="row row-cols-2 element">
                    <div class="col-1"><div class="aside-icon"><i class="fa-solid fa-chart-simple me-1"></i></div></div>
                    <div class="col-3"><span class="ms-1 hide d-md-block">
                        <a href="{{ route('admin.type.index')}}">Tipi</a>
                    </span></div>
                </div>


            </li>
            <li class="nav-item  ">
                <div class="row row-cols-2 element">
                    <div class="col-1"><div class="aside-icon"><i class="fa-solid fa-signal"></i></div></div>
                    <div class="col-3"><span class="ms-1 hide d-md-block">
                        <a href="{{ route('admin.technology.index') }}">Technology</a>
                    </span></div>
                </div>

            </li>

        </li>
        <li class="nav-item  ">
            <div class="row row-cols-2 element">
                <div class="col-1"><div class="aside-icon"><i class="fa-solid fa-signal"></i></div></div>
                <div class="col-3"><span class="ms-1 hide d-md-block">
                    <a href="{{ route('admin.type_projects') }}">Progetti per tipo</a>
                </span></div>
            </div>

        </li>
          </ul>
        </div>
        <div class="col h-100 ">
          <div class="admin d-flex align-items-end justify-content-center ">
            <div class="element d-flex align-items-end justify-content-center ">
              <i class="fa-solid fa-gear mb-1"></i>
              <span class="ms-2 hide d-md-block">Admin</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
