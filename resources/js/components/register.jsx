import React, { useState } from 'react';
import axios from 'axios';

const Register = () => {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        profile_image: null,
    });

    const handleInputChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    const handleImageChange = (e) =>{
        setFormData({
            ...formData,
            profile_image: e.target.files[0],
        });
    };

    const handleSubmit = async (e) =>{
        e.preventDefault();

        const form = new FormData();
        form.append('name', formData.name);
        form.append('email', formData.email);
        form.append('password', formData.password);
        form.append('password_confirmation', formData.password_confirmation);
        if (formData.profile_image) {
            form.append('profile_image', formData.profile_image);
        }

        try{
            const response = await axios.post('/api/register', form, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            alert(response.data.message);
        }catch (error){
            console.log(error);
            alert('There was an error registering the user.');
        }
    };

    return(
        <form onSubmit={handleSubmit}>
            <div>
                <label htmlFor="">Name</label>
                <input type="text" name="name" onChange={handleInputChange} id="" />
            </div>
            <div>
                <label htmlFor="">Email</label>
                <input type="email" name="email" onChange={handleInputChange} id="" />
            </div>
            <div>
                <label htmlFor="">Password</label>
                <input type="password" name="password" onChange={handleInputChange} id="" />
            </div>
            <div>
                <label htmlFor="">Confirm Password</label>
                <input type="password" name="password_confirmation" onChange={handleInputChange} id="" />
            </div>
            <div>
                <label htmlFor="">Profile Image</label>
                <input type="file" name="profile_image" onChange={handleInputChange} id="" />
            </div>
            <button type="submit">Register</button>
        </form>
    );
};

export default Register;