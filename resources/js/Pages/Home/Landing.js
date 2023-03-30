import React from 'react'
import HomeLayout from '../../Layouts/HomeLayout';
import ContactForm from './../../Components/ContactForm';

export default function Landing({sponsor}) {
    return (
        <HomeLayout>

            <section id="home" className="dtr-section dtr-section-with-bg dtr-hero-section-top-padding" style={{ backgroundImage: 'url(/assets/images/hero-img2.jpg)' }}>
                {/* overlay */}
                <div className="dtr-overlay dtr-overlay-white" />
                <div className="dtr-dotted-bg z-index">
                    <div className="container dtr-py-100 dtr-overlay-content">
                        {/*== row starts ==*/}
                        <div className="row d-flex align-items-center">
                            {/*== column 1 starts ==*/}
                            <div className="col-12 col-md-6">
                                <h3 className="dtr-mb-5">Turn $20 into $2,500+</h3>
                                <h1 className="color-red">GET PAID AND SAVE PEOPLE MONEY ON FUEL!</h1>
                                {/* list starts */}
                                <ul className="dtr-list-styled dtr-mt-30 color-dark">
                                    <li>Two Important Questions:</li>
                                    <li><img src="assets/images/checkmark.svg" alt="image" />Would you invest $20 to make $2,500 in profit?</li>
                                    <li><img src="assets/images/checkmark.svg" alt="image" />Do you know two other people that would do the same?</li>
                                </ul>
                                {/* list ends */}
                            </div>
                            {/*== column 1 ends ==*/}
                            {/*== column 2 starts ==*/}
                            <div className="col-12 col-md-6 small-device-space">
                                <div className="dtr-small-box dtr-rounded blank-space-left bg-red">
                                    {/* heading */}
                                    <h3 className="text-center color-white">Did You Answer Yes?!</h3>
                                    {/* form starts */}
                                    <div className="dtr-form">
                                      <ContactForm sponsor={sponsor}/>
                                    </div>
                                    {/* form ends */}
                                    {/* infoline */}
                                </div>
                            </div>
                            {/*== column 2 ends ==*/}
                        </div>
                        {/*== row ends ==*/}
                    </div>
                </div>
            </section>
            <section id="about" className="dtr-section dtr-py-100">
                <div className="container">
                    <h2 className="dtr-section-heading text-center">Start Making Money Today!<br />
                        From Home.</h2>
                    {/*== row starts ==*/}
                    <div className="row d-flex align-items-center">
                        {/*== column 1 starts ==*/}
                        <div className="col-12 col-md-6 small-device-space">
                            <div className="blank-space-right"> <img src="/assets/images/img-1.jpg" alt="image" className="dtr-xl-rounded-img" /> </div>
                        </div>
                        {/*== column 1 ends ==*/}
                        {/*== column 2 starts ==*/}
                        <div className="col-12 col-md-6">
                            {/* text*/}
                            <p className="dtr-mb-30">Our exclusive hydrocarbon catalyst helps fuel burn more efficiently, resulting in more miles per gallon.</p>
                            {/* blockquote */}
                            <blockquote className="dtr-blockquote dtr-my-30 color-dark"> This is one of the easiest, and most profitable home businesses you can own.</blockquote>
                            <p>Not only more miles per gallon, but our tabs help release more of fuels chemical energy, which eliminates carbon build up, and lowers harmful emmissions.</p>
                            <a href="#" className="dtr-btn dtr-btn-rounded btn-red dtr-mt-30">More Info?</a> </div>
                        {/*== column 2 ends ==*/}
                    </div>
                    {/*== row ends ==*/}
                </div>
            </section>
            <section className="dtr-section dtr-pt-100 dtr-pb-70 bg-purple">
                <div className="container">
                    {/*== row starts ==*/}
                    <div className="row">
                        {/*== column 1 starts ==*/}
                        <div className="col-12 col-md-4">
                            {/* feature 1 starts */}
                            <div className="dtr-feature">
                                <div className="dtr-feature-left dtr-icon-feature dtr-mb-30 color-white">
                                    <div className="dtr-feature-img"><i className="icon-clock" /></div>
                                    <h4>Set your own <br />
                                        hours</h4>
                                </div>
                                <p className="color-white-muted">This is YOUR business. Work when you want and where you want. There are no minimum time requirements.</p>
                            </div>
                            {/* feature 1 ends */}
                        </div>
                        {/*== column 1 ends ==*/}
                        {/*== column 2 starts ==*/}
                        <div className="col-12 col-md-4">
                            {/* feature 2 starts */}
                            <div className="dtr-feature">
                                <div className="dtr-feature-left dtr-icon-feature dtr-mb-30 color-white">
                                    <div className="dtr-feature-img"><i className="icon-user" /></div>
                                    <h4>You can work <br />
                                        from anywhere</h4>
                                </div>
                                <p className="color-white-muted">Work from your home, the beach, or anywhere else with just your phone, and an internet connection.</p>
                            </div>
                            {/* feature 2 ends */}
                        </div>
                        {/*== column 2 ends ==*/}
                        {/*== column 3 starts ==*/}
                        <div className="col-12 col-md-4">
                            {/* feature 3 starts */}
                            <div className="dtr-feature">
                                <div className="dtr-feature-left dtr-icon-feature dtr-mb-30 color-white">
                                    <div className="dtr-feature-img"><i className="icon-suitcase" /></div>
                                    <h4>Help people <br />
                                        save money</h4>
                                </div>
                                <p className="color-white-muted">You make money by helping others SAVE money. We can't think of a more satisfying way to make a living.</p>
                            </div>
                            {/* feature 3 ends */}
                        </div>
                        {/*== column 3 ends ==*/}
                    </div>
                    {/*== row ends ==*/}
                </div>
            </section>
            <section className="dtr-section dtr-py-100 bg-dual-blue">
                <div className="container">
                    {/*== row starts ==*/}
                    <div className="row d-flex">
                        {/*== column 1 starts ==*/}
                        <div className="col-12 col-md-6">
                            <div className="blank-space-right">
                                <p className="dtr-tagline color-red">YOUR BUSINESS IN 80 COUNTRIES</p>
                                <h2 className="dtr-section-heading">Share this simple <br />
                                    marketing website.</h2>
                                <p className="color-dark">Millions of people around the world want to save money on fuel.</p>
                                <p className="color-dark">With our proven system, you can start an international business with just your phone, tablet, or computer. </p>
                                <p className="dtr-mt-40 color-dark">Share your <span className="font-weight-bold color-red">FREE WEBSITE</span> and earn on every new order.</p>
                            </div>
                        </div>
                        {/*== column 1 ends ==*/}
                        {/*== column 2 starts ==*/}
                        <div className="col-12 col-md-6 small-device-space">
                            <div className="dtr-video-wrapper dtr-video-center dtr-video-btn-white h-100 dtr-xl-rounded" style={{ backgroundImage: 'url(/assets/images/img-4.jpg)' }}>
                                {/* video button */}
                                <a className="dtr-video-popup dtr-video-button" data-autoplay="true" data-vbtype="video" href="#"><span className="dtr-video-button-inner" /><span className="dtr-border-animation dtr-border-1" /> <span className="dtr-border-animation dtr-border-2" /> <span className="dtr-border-animation dtr-border-3" /> </a> </div>
                        </div>
                        {/*== column 2 ends ==*/}
                    </div>
                    {/*== row ends ==*/}
                </div>
            </section>
            <section className="dtr-section dtr-py-100">
                <div className="container">
                    {/*== row starts ==*/}
                    <div className="row d-flex align-items-center">
                        {/*== column 1 starts ==*/}
                        <div className="col-12 col-md-6">
                            <div className="blank-space-right"> <img src="/assets/images/img-3.jpg" alt="image" className="dtr-xl-rounded-img" /> </div>
                        </div>
                        {/*== column 1 ends ==*/}
                        {/*== column 2 starts ==*/}
                        <div className="col-12 col-md-6 small-device-space">
                            {/* text */}
                            <p className="dtr-tagline color-red">A SOLID BUSINESS OPPORTUNITY</p>
                            <h2 className="dtr-section-heading">A great business starts
                                <br />with an amazing product.</h2>
                            {/*== accordion starts ==*/}
                            <div className="dtr-accordion accordion accordion-flush" id="accordion1">
                                {/* item 1 starts */}
                                <div className="accordion-item">
                                    <h2 className="accordion-header" id="accordion1-headingOne">
                                        <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion1-collapseOne" aria-expanded="false" aria-controls="accordion1-collapseOne"> A product that works</button>
                                    </h2>
                                    <div id="accordion1-collapseOne" className="accordion-collapse collapse show" aria-labelledby="accordion1-headingOne" data-bs-parent="#accordion1">
                                        <div className="accordion-body">Improve the fuel consumption of your vehicle with our concentrated Fuel Tabs! Used by commercial fleets for years, now available to the public, our Fuel Tabs are an amazing fuel saver and engine cleaner.</div>
                                    </div>
                                </div>
                                {/* item 1 ends */}
                                {/* item 2 starts */}
                                <div className="accordion-item">
                                    <h2 className="accordion-header" id="accordion1-headingTwo">
                                        <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion1-collapseTwo" aria-expanded="false" aria-controls="accordion1-collapseTwo"> A business that pays</button>
                                    </h2>
                                    <div id="accordion1-collapseTwo" className="accordion-collapse collapse" aria-labelledby="accordion1-headingTwo" data-bs-parent="#accordion1">
                                        <div className="accordion-body">Get paid 50% of the retail price on every customer order. Plus, lifestyle bonuses, check matches, and commissions on all re-orders, every month.</div>
                                    </div>
                                </div>
                                {/* item 2 ends */}
                                {/* item 3 starts */}
                                <div className="accordion-item">
                                    <h2 className="accordion-header" id="accordion1-headingThree">
                                        <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion1-collapseThree" aria-expanded="false" aria-controls="accordion1-collapseThree"> Free tools for success</button>
                                    </h2>
                                    <div id="accordion1-collapseThree" className="accordion-collapse collapse" aria-labelledby="accordion1-headingThree" data-bs-parent="#accordion1">
                                        <div className="accordion-body">This is your business, but you are not in this alone. Free weekly training. Free websites, and marketing system, and decades of experience to rely on.</div>
                                    </div>
                                </div>
                                {/* item 3 ends */}
                            </div>
                            {/*== accordion ends ==*/}
                        </div>
                        {/*== column 2 ends ==*/}
                    </div>
                    {/*== row ends ==*/}
                </div>
            </section>

        </HomeLayout>
    )
}
