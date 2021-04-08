
<nav class="navbar navbar-top navbar-horizontal navbar-expand-lg navbar-dark">
    <div class="container px-auto">
            <a class="navbar-brand text-white" href="{{ route('root') }}">
                    <i class="fa fa-search"></i>
                    FindIt
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('homeStudents') }}">
                        <i class="fa fa-users"></i>
                        <span class="nav-link-inner--text">{{ __('Students') }}</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">{{ __('Register') }}</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('studentRegistration') }}">
                        <i class="ni ni-circle-08"></i>
                        <span class="nav-link-inner--text">{{ __('Student') }}</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('employerRegistration') }}">
                        <i class="ni ni-circle-08"></i>
                        <span class="nav-link-inner--text">{{ __('Employer') }}</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">{{ __('Login') }}</span>
                    </a>
                </li>
              </ul>
            </div>     
    </div>
  </nav>