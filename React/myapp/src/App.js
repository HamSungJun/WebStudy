import React, { Component } from 'react';
import './App.css';
import Movie from './Movie'

const Alp = ['A','B','C','D'];

const Src = [
  'https://cdn.movieweb.com/img.news.tops/NEd1hmE3IeQgge_1_b/The-Matrix-4-Reboot-Plot-Keanu-Reeves.jpg',
  'http://www.greatgrubclub.com/domains/greatgrubclub.com/local/media/images/medium/4_1_1_apple.jpg',
  'http://www.greatgrubclub.com/domains/greatgrubclub.com/local/media/images/medium/AZasparagus.jpg',
  'http://www.greatgrubclub.com/domains/greatgrubclub.com/local/media/images/medium/AZasparagus.jpg'
]

class App extends Component {
  render() {
    return (
      <div className="App">
        <Movie title={Alp[0]} src={Src[0]}/>
        <Movie title={Alp[1]} src={Src[1]}/>
        <Movie title={Alp[2]} src={Src[2]}/>
        <Movie title={Alp[3]} src={Src[3]}/>
      </div>
    );
  }
}

export default App;
