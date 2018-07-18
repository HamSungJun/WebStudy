import React, { Component } from 'react';
import './App.css';
import Movie from './Movie';

// Render : componentWillMount -> render -> componentDidMount
// Update : componentWillReceiveProps -> shouldComponentUpdate -> componentWillUpdate -> Render - > componentDidUpdate

class App extends Component {
  state = {};

  componentDidMount(){
    this._getMovies();
  }

  _renderMovies = () => {
      const movies = this.state.movies.map((movie_data) => {
          console.log(movie_data);
         return <Movie
             title={movie_data.title_english}
             poster={movie_data.medium_cover_image}
             key={movie_data.id}
             genres={movie_data.genres}
             synopsis={movie_data.synopsis}/>
      });

      return movies;
  };

  _getMovies = async () => {
      const movies = await this._callApi();
      this.setState({movies})
  };

  _callApi = () => {
      return fetch("https://yts.am/api/v2/list_movies.json?sort_by=rating")
          .then((response) => {return response.json()})
          .then((json) => {return json.data.movies}).catch((err) => {console.log(err)});
  };

  render() {
    console.log("Did Render");
    const {movies} = this.state;
    return (
      <div className={movies ? "App" : "App--loading"}>
          {movies ? this._renderMovies() : 'Loading'}
      </div>
    )
  }
}

export default App;
