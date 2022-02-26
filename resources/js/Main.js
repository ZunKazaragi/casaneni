import ReactDOM from 'react-dom'
import React from 'react'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom'
import { CssBaseline } from '@mui/material'
import Login from './pages/Login'
import Navbar from './components/Navbar'

function Home () {
    return (
        <div>
            <Navbar title='Home'/>
            <h1>Home</h1>
        </div>
    )
}

function About () {
    return (
        <div>
            <Navbar title='About'/>
            <h1>About</h1>
        </div>
    )
}

export default function Main () {
    return (
        <React.Fragment>
            <CssBaseline />
            <BrowserRouter>
                <Routes>
                    <Route path='/' element={<Home />} />
                    <Route path='about' element={<About />} />
                    <Route path='login' element={<Login />} />
                </Routes>
            </BrowserRouter>
        </React.Fragment>
    )
}

if (document.getElementById('app')) {
    ReactDOM.render(<Main />, document.getElementById('app'))
}
