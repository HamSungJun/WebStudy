import React , { Component } from 'react';
import './Movie.css';

class Movie extends Component{
    render(){
        console.log(this.props);
        return (
            
            <div>
                <MoviePoster src={this.props.src} />
                <h1>{this.props.title}</h1>
            </div>

        )
    }
}

class MoviePoster extends Component{
    render(){
        return (
            <img src={this.props.src}/>
        )
    }
}

export default Movie;
