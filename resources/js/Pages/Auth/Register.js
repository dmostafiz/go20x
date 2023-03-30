import React, { useEffect, useState } from 'react';
import Button from '@/Components/Button';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/inertia-react';
import HomeLayout from './../../Layouts/HomeLayout';
import Countries from './../../Components/Countries';

export default function Register({ sponsor_id }) {

    useEffect(() => {
        console.log('Sponsor ID: ', sponsor_id)
    }, [])
    const { data, setData, post, processing, errors, reset } = useForm({
        sponsor_id: sponsor_id,
        username: '',
        name: '',
        email: '',
        country: '',
        phone_number: '',
        password: '',
        password_confirmation: '',
    });

    const [currentCountry, setCurrentCountry] = useState(null)

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const handleChangeCountry = (value) => {
        setData({ ...data, country: value })

        const selectCountry = Countries.find(cty => cty.name == value)
        setCurrentCountry(selectCountry)
        console.log('selectCountry', selectCountry)
    }

    const submit = (e) => {
        e.preventDefault();

        post(route('register.post'));
    };

    return (
        <HomeLayout>
            <Head title="Register" />


            <section id="home" className="dtr-section dtr-section-with-bg dtr-hero-section-top-padding" style={{ backgroundImage: 'url(/assets/images/hero-img2.jpg)' }}>
                {/* overlay */}
                <div className="dtr-overlay dtr-overlay-white" />
                <div className="dtr-dotted-bg z-index">
                    <div className="container py-12 dtr-overlay-content">
                        {/*== row starts ==*/}
                        <div className="row d-flex align-items-center">
                            <div className="col-12 col-md-6">
                                {/* <h3 className="dtr-mb-5">Turn $20 into $2,500+</h3>
                                <h1 className="color-red">GET PAID AND SAVE PEOPLE MONEY ON FUEL!</h1>
                                <ul className="dtr-list-styled dtr-mt-30 color-dark">
                                    <li>Two Important Questions:</li>
                                    <li><img src="assets/images/checkmark.svg" alt="image" />Would you invest $20 to make $2,500 in profit?</li>
                                    <li><img src="assets/images/checkmark.svg" alt="image" />Do you know two other people that would do the same?</li>
                                </ul> */}

                                {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

                                <ValidationErrors errors={errors} />

                            </div>

                            <div className="col-12 col-md-5 small-device-space">

                                <div className="w-full">
                                    <div className="flex items-center justify-center">
                                        <h4>Join the community</h4>
                                    </div>
                                    <form onSubmit={submit} className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">


                                        <div className="mb-6 flex item-container justify-between gap-2">

                                            <div className="w-1/2">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
                                                    Sponsor ID
                                                </label>
                                                <input
                                                    className="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="sponsor_id"
                                                    type="text"
                                                    name="sponsor_id"
                                                    placeholder="Enter sponsor id"
                                                    value={data.sponsor_id}
                                                    readOnly={sponsor_id ? true : false}
                                                    onChange={onHandleChange}
                                                />
                                            </div>

                                            <div className="w-1/2">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
                                                    Username (unique)
                                                </label>
                                                <input
                                                    className="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="username"
                                                    type="text"
                                                    name="username"
                                                    placeholder="Choose a username"
                                                    value={data.username}
                                                    onChange={onHandleChange}
                                                />
                                            </div>

                                        </div>

                                        <div className="mb-6 flex item-container justify-between gap-2">
                                            <div className="w-1/2">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
                                                    Full Name
                                                </label>
                                                <input
                                                    className="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="name"
                                                    type="text"
                                                    name="name"
                                                    placeholder="Your full name"
                                                    value={data.name}
                                                    onChange={onHandleChange}
                                                />
                                            </div>

                                            <div className="w-1/2">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
                                                    Email
                                                </label>
                                                <input
                                                    className="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="email"
                                                    type="email"
                                                    name="email"
                                                    placeholder="Email address"
                                                    value={data.email}
                                                    onChange={onHandleChange}
                                                />
                                            </div>
                                        </div>


                                        <div className="mb-6 flex item-container justify-between gap-2">
                                            <div className="w-1/2">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="password">
                                                    Password
                                                </label>
                                                <input
                                                    className="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="password"
                                                    type="password"
                                                    name="password"
                                                    placeholder="Password"
                                                    value={data.password}
                                                    onChange={onHandleChange}
                                                />
                                            </div>
                                            <div className="w-1/2">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="password">
                                                    Confirm Password
                                                </label>
                                                <input
                                                    className="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="password_confirmation"
                                                    type="password"
                                                    name="password_confirmation"
                                                    placeholder="Confirm the password"
                                                    value={data.password_confirmation}
                                                    onChange={onHandleChange}
                                                />
                                            </div>
                                        </div>


                                        <div className="mb-6 flex w-full item-container justify-between gap-2">
                                            <div className="w-5/12">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
                                                    Country
                                                </label>

                                                <select
                                                    className="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="country"
                                                    value={data.country}
                                                    onChange={e => handleChangeCountry(e.target.value)}
                                                >
                                                    <option value=''>Select your country</option>
                                                    {Countries.map((country, index) => <option key={index}>{country.name}</option>)}
                                                </select>
                                            </div>

                                            {currentCountry && <div className="w-7/12">
                                                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
                                                    Phone Number
                                                </label>
                                                <div className='shadow-sm appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline flex items-center gap-1'>
                                                    <div className='flex items-center gap-1'>
                                                        <i className={`fp text-sm fp-rounded ${currentCountry?.code.toLowerCase()}`}></i>
                                                        <span className="text-xs">{currentCountry?.dial_code}</span>
                                                    </div>
                                                    <input
                                                        className="border-0 py-0 px-3 focus:ring-0"
                                                        id="phone_number"
                                                        type="text"
                                                        name="phone_number"
                                                        placeholder="Enter phone no"
                                                        value={data.phone_number}
                                                        onChange={onHandleChange}
                                                    />
                                                </div>
                                            </div>}


                                        </div>

                                        <div className="flex items-center justify-between">
                                            <button className="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline text-sm" type="submit">
                                                Create account
                                            </button>
                                            <Link href='/login' className="inline-block align-baseline font-bold text-sm text-yellow-500 hover:text-blue-800">
                                                Already have an account?
                                            </Link>
                                        </div>
                                    </form>
                                    {/* <p className="text-center text-gray-500 text-xs">
                                        ©2020 Acme Corp. All rights reserved.
                                    </p> */}
                                </div>





                            </div>
                            {/*== column 2 ends ==*/}
                        </div>
                        {/*== row ends ==*/}
                    </div>
                </div>
            </section>
        </HomeLayout>
    );
}
