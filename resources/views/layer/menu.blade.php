<div class="sidebar" data-color="azure" data-image="{{ asset('img/1.jpg') }}">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            Ct
        </a>

		<a href="http://www.creative-tim.com" class="simple-text logo-normal">
			Creative Tim
		</a>
    </div>

	<div class="sidebar-wrapper">
        <div class="user">
			<div class="info">
				<div class="photo">
                    <img src="{{ asset('img/1.jpg') }}" />
                </div>

				<a data-toggle="collapse" href="#collapseExample" class="collapsed">
					<span>
						{{Session::get('ten_bac_si')}}
                        <b class="caret"></b>
					</span>
                </a>

				<div class="collapse" id="collapseExample">
					<ul class="nav">
						<li>
							<a href="#pablo">
								<span class="sidebar-mini">MP</span>
								<span class="sidebar-normal">My Profile</span>
							</a>
						</li>

						<li>
							<a href="#pablo">
								<span class="sidebar-mini">EP</span>
								<span class="sidebar-normal">Edit Profile</span>
							</a>
						</li>

						<li>
							<a href="#pablo">
								<span class="sidebar-mini">S</span>
								<span class="sidebar-normal">Settings</span>
							</a>
						</li>
					</ul>
                </div>
			</div>
        </div>

		<ul class="nav">
                <li class="active">
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="pe-7s-plugin"></i>
                        <p>Admin
                           <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="componentsExamples">
                        <ul class="nav">
                            <li>
								<a href="{{-- {{route('view_all_admin')}} --}}">
									<span class="sidebar-normal">Xem admin</span>
								</a>
							</li>
                        </ul>
                    </div>
                </li>
                <li>
					<a data-toggle="collapse" href="#tablesExamples">
                        <i class="pe-7s-news-paper"></i>
                        <p>Khách hàng
                           <b class="caret"></b>
                        </p>
                    </a>
					<div class="collapse" id="tablesExamples">
						<ul class="nav">
							<li>
								<a href="tables/regular.html">
									<span class="sidebar-mini">RT</span>
									<span class="sidebar-normal">Xem Khách Hàng</span>
								</a>
							</li>
							<li>
								<a href="tables/extended.html">
									<span class="sidebar-mini">ET</span>
									<span class="sidebar-normal">Khách hàng bị cấm</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
                <li>
					<a data-toggle="collapse" href="#mapsExamples">
                        <i class="pe-7s-map-marker"></i>
                        <p>Bác Sĩ
                           <b class="caret"></b>
                        </p>
                    </a>
					<div class="collapse" id="mapsExamples">
						<ul class="nav">
							<li>
								<a href="{{ route('view_ngay_lam_viec') }}">
									<span class="sidebar-mini">XBS</span>
									<span class="sidebar-normal">Xem Bác Sĩ</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a data-toggle="collapse" href="#pagesExamples">
                        <i class="pe-7s-gift"></i>
                        <p>Ca Làm Việc
                           <b class="caret"></b>
                        </p>
                    </a>
					<div class="collapse" id="pagesExamples">
						<ul class="nav">
							<li>
								<a href="pages/user.html">
									<span class="sidebar-mini">UP</span>
									<span class="sidebar-normal">Xem Ca Làm Việc</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a data-toggle="collapse" href="#formsExamples">
                        <i class="pe-7s-note2"></i>
                        <p>Lịch Hẹn
                           <b class="caret"></b>
                        </p>
                    </a>
					<div class="collapse" id="formsExamples">
						<ul class="nav">
							<li>
								<a href="forms/regular.html">
									<span class="sidebar-mini">Rf</span>
									<span class="sidebar-normal">Xem Lịch Hẹn</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a  href="{{ route('logout') }}">
                        <p>Đăng xuất</p>
                    </a>
				</li>
            </ul>
	</div>
</div>
