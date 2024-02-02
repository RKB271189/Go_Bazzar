<template>
  <nav
    class="navbar navbar-expand-lg navbar-dark bg-success"
    style="padding-top: 0px !important; padding-bottom: 0px !important"
  >
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#main_nav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <router-link class="nav-link" to="/">Home </router-link>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Free Ads
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#">Electronics & Appliances</a>
              </li>
              <li><a class="dropdown-item" href="#">Auto</a></li>
              <li><a class="dropdown-item" href="#">Pets</a></li>
              <li><a class="dropdown-item" href="#">Furniture</a></li>
              <li>
                <a class="dropdown-item" href="#">Books, Sports and Hobbies</a>
              </li>
              <li><a class="dropdown-item" href="#">Fashion</a></li>
              <li><a class="dropdown-item" href="#">Kids</a></li>
              <li><a class="dropdown-item" href="#">Services</a></li>
              <li><a class="dropdown-item" href="#">Job Portal</a></li>
              <li><a class="dropdown-item" href="#">Real Estate</a></li>
              <li><a class="dropdown-item" href="#">Travels</a></li>
              <li><a class="dropdown-item" href="#">Roommates</a></li>
              <li><a class="dropdown-item" href="#">Personal care</a></li>
              <li><a class="dropdown-item" href="#">Education</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Business Directory
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#"> Travel &raquo; </a>
                <ul class="submenu dropdown-menu">
                  <li>
                    <router-link class="dropdown-item" to="/directory"
                      >Taxi/Cab</router-link
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"> Hotels / Motels</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"> Travel Agents</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="dropdown-item" href="#"> Business &raquo; </a>
                <ul class="submenu dropdown-menu">
                  <li><a class="dropdown-item" href="#">Appliances </a></li>
                  <li><a class="dropdown-item" href="#">Car Dealers</a></li>
                  <li><a class="dropdown-item" href="#">Garage</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Courier/Shipping </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Printing and Signs</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Insurance Agent</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="dropdown-item" href="#"> Real Estate &raquo;</a>
                <ul class="submenu dropdown-menu">
                  <li><a class="dropdown-item" href="#">Apartments</a></li>
                  <li><a class="dropdown-item" href="#">Furniture</a></li>
                  <li><a class="dropdown-item" href="#">Builders</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Mortgage Agent</a>
                  </li>
                  <li><a class="dropdown-item" href="#">Realtors</a></li>
                  <li>
                    <a class="dropdown-item" href="#"
                      >Pest and Insect Control</a
                    >
                  </li>
                  <li><a class="dropdown-item" href="#">Movers</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Services</a
            >
            <ul class="dropdown-menu">
              <li>
                <router-link class="dropdown-item" to="/service">
                  Accounting & Tax
                </router-link>
              </li>
              <li><a class="dropdown-item" href="#"> Driving School </a></li>
              <li><a class="dropdown-item" href="#"> Food: Home Made </a></li>
              <li><a class="dropdown-item" href="#"> Legal Services </a></li>
              <li>
                <a class="dropdown-item" href="#"> Financial Planning </a>
              </li>
              <li>
                <a class="dropdown-item" href="#"> Decorations - Events </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              News Paper
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> Hindi </a></li>
              <li>
                <a class="dropdown-item" href="#"> Gujarati &raquo;</a>
                <ul class="submenu dropdown-menu">
                  <li><a class="dropdown-item" href="#"> Sandesh</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Gujarat Samachar</a>
                  </li>
                  <li><a class="dropdown-item" href="#">Divya Bhaskar</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Others
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Entertainment</a></li>
              <li>
                <a class="dropdown-item" href="#">Hotels and Restaurants</a>
              </li>
              <li><a class="dropdown-item" href="#">Education</a></li>
              <li><a class="dropdown-item" href="#">Community</a></li>
              <li>
                <a class="dropdown-item" href="#"
                  >Home Maintenance & Services</a
                >
              </li>
              <li><a class="dropdown-item" href="#">Society & People</a></li>
              <li><a class="dropdown-item" href="#">Health</a></li>
              <li><a class="dropdown-item" href="#">General</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/contact">
              Contact Us
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" href="#" to="/login">
              Login
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {};
</script>

<style>
</style>