/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';

import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Register from './components/register';

function App(){
    return (
        <Router>
            <Routes>
                <Route path="/register" element={<Register />} />
            </Routes>
        </Router>
    );
}

ReactDOM.render(<App />, document.getElementById('app'));
// ReactDOM.render(<App />, document.getElementById('app')).render(
//     <React.StrictMode>
//         <Register />
//     </React.StrictMode>
// );
