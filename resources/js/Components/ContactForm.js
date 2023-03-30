import React, { useState } from 'react'
import { Inertia } from '@inertiajs/inertia';

export default function ContactForm({sponsor}) {
    const [data, setData] = useState({
        sponsor: sponsor,
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        country: ''
    })

    const submitFrom = (e) => {
        e.preventDefault()
        
        Inertia.post('/save_contact', data)

        setData({
            ...data,
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            country: ''
        })
    }
    return (
        <form onSubmit={submitFrom}>
            <fieldset>
                {/* form two columns start */}
                <div className="dtr-form-row dtr-form-row-2col clearfix">
                    <div className="dtr-form-column">
                        <p className="dtr-form-field">
                            <input onChange={e => setData({ ...data, first_name: e.target.value })} value={data.first_name} name="firstName" type="text" placeholder="First Name" />
                        </p>
                    </div>
                    <div className="dtr-form-column">
                        <p className="dtr-form-field">
                            <input onChange={e => setData({ ...data, last_name: e.target.value })} value={data.last_name} name="lastName" type="text" placeholder="Last Name" />
                        </p>
                    </div>
                </div>
                {/* form two columns ends */}
                <p className="dtr-form-field">
                    <input onChange={e => setData({ ...data, email: e.target.value })} value={data.email} name="email" className="required email" type="text" placeholder="Email Address" />
                </p>
                <p className="dtr-form-field">
                    <input onChange={e => setData({ ...data, phone: e.target.value })} value={data.phone} name="phone" type="text" placeholder="Phone Number" />
                </p>
                <p className="dtr-form-field">
                    <input onChange={e => setData({ ...data, country: e.target.value })} value={data.country} name="country" type="text" placeholder="Country" />
                </p>
                <p className="antispam">Leave this empty: <br />
                    <input name="url" />
                </p>
                <p>
                    <button name="submit" className="dtr-btn dtr-btn-rounded btn-dark w-100" type="submit"> <i className="btn-text">I HAVE $20. SHOW ME HOW IT WORKS</i></button>
                </p>
                <div id="contactresult" />
            </fieldset>
        </form>
    )
}
