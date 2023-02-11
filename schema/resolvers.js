const { UserList, MovieList } = require("../FakeData");
const _ = require("lodash");

const resolvers = {
  Query: {
    // USER RESOLVERS for all the users
    users: () => {
      return UserList;
    },
    // single user using argument
    user: (parent, args) => {
      const id = args.id;
      const user = _.find(UserList, { id: Number(id) });
      return user;
    },
    // Movie resolvers for all the movies
    movies: () => {
      return MovieList;
    },

    // single Movie resolvers for all the movies
    movie: (parent, args) => {
      const name = args.name;
      const movie = _.find(MovieList, { name: name });
      return movie;
    },
  },

  User: {
    favoriteMovies: () => {
      return _.filter(
        MovieList,
        (movie) => movie.yearOfPublication >= 2000 && movie.yearOfPublication <= 2010
      );
    },
  },

  Mutation: {
    // to create a new user
    createUser: (parent, args) => {
      const newUser = args.input;
      const lastId = UserList[UserList.length - 1].id;
      newUser.id = lastId + 1;
      UserList.push(newUser);
      return newUser;
    },

    // update username of the user
    updateUsernameInput: (parent, args) => {
      const { id, newUsername } = args.input;
      let updatedUser;
      UserList.forEach((user) => {
        if (user.id === Number(id)) {
          user.username = newUsername;
          updatedUser = user;
        }
      });
      return updatedUser;
    },

    deleteUser: (parent, args) => {
      const id = args.id;
      _.remove(UserList, (user) => user.id === Number(id));
      return null;
    },
  },
};

module.exports = { resolvers };
