import { Link, usePage } from '@inertiajs/inertia-react'
import React from 'react'
import auth from './../Hooks/auth';

export default function TopNavbar() {

    const authUser = auth()

    console.log('authUser: ', authUser)
    return (
        <header id="dtr-header-global" className="fixed-top">
            <div className="container d-flex align-items-center justify-content-between">
                {/* header left starts */}
                <div className="dtr-header-left p-0">

                    <Link className="logo-default dtr-scroll-link" href="/">
                        <img width="150px" src="/assets/images/logo-dark.png" alt="logo" />
                    </Link>

                    <Link className="logo-alt dtr-scroll-link" href="/">
                        <img width="150px" src="/assets/images/logo-dark.png" alt="logo" />
                    </Link>

                    {/* logo on scroll ends */}
                </div>
                {/* header left ends */}
                {/* menu starts*/}
                <div className="main-navigation">
                    <ul className="sf-menu dtr-nav dark-nav-on-load dark-nav-on-scroll">
                        <li>
                            <a className="nav-link" href="/">
                            </a>
                        </li>
                    </ul>
                </div>
                {/* menu ends */}


                {/* <!-- header right starts --> */}
                <div className="dtr-header-right dtr-header-contact"> <i>Everyone is talking about fuel prices! You can help!</i></div>
                {/* <!-- header right ends --> */}

                {/* header right starts */}
                {/* <div className="main-navigation dtr-header-right">
                    <ul className="sf-menu dtr-nav dark-nav-on-load dark-nav-on-scroll">
                        {authUser && <li>
                            <a className="nav-link" href="/admin/dashboard">
                                Dashboard
                            </a>
                        </li>}

                        {!authUser && <>

                            <li>
                                <Link className="nav-link" href="/login">
                                    Login
                                </Link>
                            </li>

                            <li>
                                <Link className="nav-link" href="/join">
                                    
                                    <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                        Join now
                                    </button>
                                </Link>
                            </li>

                        </>}


                    </ul>
                </div> */}
                {/* header right ends */}
            </div>
        </header>
    )
}
