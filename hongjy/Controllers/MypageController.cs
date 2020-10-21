using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace hongjy.Controllers
{
    public class MypageController : Controller
    {
        // GET: MypageController
        public ActionResult Index()
        {
            return View();
        }

        /// <summary>
        /// 个人主页
        /// </summary>
        /// <returns></returns>
        public ActionResult Split()
        {
            return View();
        }

        /// <summary>
        /// 网页版个人炫酷个人介绍页面
        /// </summary>
        /// <returns></returns>
        public ActionResult Alan()
        {
            return View();
        }

        /// <summary>
        /// markdown简历
        /// </summary>
        /// <returns></returns>
        public ActionResult Resume()
        {
            return View();
        }

        /// <summary>
        /// 拉钩简历
        /// </summary>
        /// <returns></returns>
        public ActionResult Lagou()
        {
            return View();
        }

        // GET: MypageController/Details/5
        public ActionResult Details(int id)
        {
            return View();
        }

        // GET: MypageController/Create
        public ActionResult Create()
        {
            return View();
        }


        #region html&css pages

        public ActionResult HtmlHome()
        {
            return View();
        }

        public ActionResult Ctrip()
        {
            return View();
        }

        public ActionResult Jd()
        {
            return View();
        }

        public ActionResult Xczx()
        {
            return View();
        }

        public ActionResult Yundao()
        {
            return View();
        }

        #endregion


        // POST: MypageController/Create
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(IFormCollection collection)
        {
            try
            {
                return RedirectToAction(nameof(Index));
            }
            catch
            {
                return View();
            }
        }

        // GET: MypageController/Edit/5
        public ActionResult Edit(int id)
        {
            return View();
        }

        // POST: MypageController/Edit/5
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(int id, IFormCollection collection)
        {
            try
            {
                return RedirectToAction(nameof(Index));
            }
            catch
            {
                return View();
            }
        }

        // GET: MypageController/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }

        // POST: MypageController/Delete/5
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Delete(int id, IFormCollection collection)
        {
            try
            {
                return RedirectToAction(nameof(Index));
            }
            catch
            {
                return View();
            }
        }
    }
}
